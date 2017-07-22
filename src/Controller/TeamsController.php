<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Lib\Nbb\Club;
use App\Lib\Nbb\Competition;
use App\Lib\Nbb\Nbb;
use App\Lib\Nbb\Teams;
use Ghunti\HighchartsPHP\Highchart;

/**
 * Teams Controller
 *
 * @property \App\Model\Table\TeamsTable $Teams
 */
class TeamsController extends AppController
{

    //TODO set to global var for club id
    public $clubId = 81;

    /** @var  Club $clubController */
    public $clubController;

    /** @var Teams $teamController */
    public $teamController;

    /** @var Competition $competitionController */
    public $competitionController;

    public function initialize()
    {
        $this->clubController = new Club();
        $this->teamController = new Teams();
        $this->competitionController = new Competition();
    }


    public function index($teamId){

        //$team = $this->teamController->getTeamInfo($id);

        $schedule =$this->teamController->getScheduleByTeamId($teamId);

        $competitionId = $this->teamController->getCompetitionIdByTeamId($teamId);

        $stand = $this->competitionController->getScoreByCompetitionId($competitionId);

        //$competition = $nbb->getCompetition($comp_id);

        $results = $this->teamController->getResultsByTeam($teamId);

        $score_home = [];
        /*
        $i= 1;
        foreach ($competition->wedstrijden as $key => $value){

            //TODO set to global club id
            if($value->thuis_club_id == 81){
                if($value->score_thuis != 0){
                    $score = ['x' => $i, 'y' => (int) $value->score_thuis];
                    $i++;
                    $score_home[] = $score;
                }
            }

            if($value->uit_club_id == 81){
                if($value->score_uit != 0){
                    $score = ['x' =>  $i, 'y' => (int) $value->score_uit];
                    $i++;
                    $score_home[] = $score;
                }
            }

        }*/

        $this->set(compact('teamId', 'competition', 'stand', 'score_home', 'schedule', 'results'));
        $this->set('_serialize', ['team']);

    }

    public function roster($id){

        $team = $this->Teams->get($id);

        $this->set(compact('team'));
        $this->set('_serialize', ['team']);

    }

    public function standing($id){

        $nbb = new Nbb();

        $team = $this->Teams->get($id);

        $comp_id = $team->comp_id_1;

        $stand = $nbb->getScore($comp_id);

        $stats = $nbb->getStats($comp_id);

        $standings = [];

        $GB_team_A_W =  '';
        $GB_team_A_L = '';

        foreach ($stand->stand as $key => $value){


            if($value->status != "Actief"){
                continue;
            }
            //debug($value);exit;

            $W= $value->punten / 2;
            $L = (($value->gespeeld * 2 ) - $value->punten) /2;


            if($value->positie == 1){
                $GB = 0;
                $GB_team_A_W = $W;
                $GB_team_A_L = $L;
            }else{
                $GB = ($GB_team_A_W - $W) + ($L - $GB_team_A_L ) / 2;
            }

            $standings[] = [
                "Pos" => $value->positie,
                "Name" => $value->team,
                "W" => $value->punten / 2,
                "L" => (($value->gespeeld * 2 ) - $value->punten) /2,
                "PCT"=> number_format($value->punten / 2 / $value->gespeeld, 3),
                "GB" => $GB,
                "PPG" => $value->eigenscore / $value->gespeeld,
                "OP PPG" => $value->tegenscore / $value->gespeeld,
                "home" =>  $stats[$value->ID]['home'],
                "road" =>  $stats[$value->ID]['away'],
                "streak" =>  $stats[$value->ID]['streak'],
                "L5" =>  $stats[$value->ID]['L5'],
            ];
        }


        $this->set(compact('standings', 'team'));
    }

    public function results($id){
        $team = $this->Teams->get($id);

        $nbb = new Nbb();
        $results = $nbb->getResultsByTeam($team->nbb_id);

        $this->set(compact('team', 'results'));
        $this->set('_serialize', ['team']);

    }


    public function schedule($id){

        $team = $this->Teams->get($id);

        //TODO make fix
        $comp_id = $team->comp_id_1;
        if($team->comp_id_2 != null){
            $comp_id = $team->comp_id_2;
        }

        $nbb = new Nbb();

        $schedule = $nbb->getSchedule($comp_id, $team->nbb_id);

        $this->set(compact('team', 'schedule'));
        $this->set('_serialize', ['team']);

    }

    public function gallery($id){

        $team = $this->Teams->get($id);

        $this->set(compact('team'));
        $this->set('_serialize', ['team']);

    }

}
