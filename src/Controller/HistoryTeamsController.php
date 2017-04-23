<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Lib\Nbb\Nbb;

/**
 * HistoryTeams Controller
 *
 * @property \App\Model\Table\HistoryTeamsTable $HistoryTeams
 */
class HistoryTeamsController extends AppController
{
    public function index($id){

        $team = $this->HistoryTeams->get($id);

        $comp_id = $team->comp_id_1;
        if($team->comp_id_2 != null){
            $comp_id = $team->comp_id_2;
        }

        $nbb = new Nbb();

        $stand = $nbb->getScore($comp_id);

        $competition = $nbb->getCompetition($comp_id);

        $score_home = [];

        foreach ($competition->wedstrijden as $key => $value){

            //debug($value);
            $date = explode(" ", $value->datum);

            //TODO set to global club id
            if($value->thuis_club_id == 81){
                if($value->score_thuis != 0){
                    $score_home[$date[0]] = $value->score_thuis;
                }

            }

            if($value->uit_club_id == 81){
                if($value->score_uit != 0){
                    $score_home[$date[0]] = $value->score_uit;
                }

            }

        }


        $this->set(compact('team', 'competition', 'stand', 'score_home'));
        $this->set('_serialize', ['team']);

    }

    public function roster($id){

        $team = $this->HistoryTeams->get($id);

        $this->set(compact('team'));
        $this->set('_serialize', ['team']);

    }

    public function standing($id){

        $nbb = new Nbb();

        $team = $this->HistoryTeams->find()->where(['HistoryTeams.id' => $id])->contain(['Years'])->first();

        //debug($team);
        $comp_id = $team->comp_id_1;
        if($team->comp_id_2 != null){
            $comp_id = $team->comp_id_2;
        }


        $stand = $nbb->getScore($comp_id, $team->year->start);

        $stats = $nbb->getStats($comp_id, $team->year->start);

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
        $team = $this->HistoryTeams->get($id);

        $this->set(compact('team'));
        $this->set('_serialize', ['team']);

    }


    public function schedule($id){

        $team = $this->HistoryTeams->get($id);

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

        $team = $this->HistoryTeams->get($id);

        $this->set(compact('team'));
        $this->set('_serialize', ['team']);

    }

}
