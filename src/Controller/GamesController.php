<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Lib\Nbb\Nbb;

/**
 * Games Controller
 *
 * "alt": "River Trotters",
"adres": "Postbus 9",
"shirt": "Geel",
"plaats": "Hardinxveld-Giessendam",
"web": "http://www.rivertrotters.nl/",
"org_id": "2",
"id": "81",
"naam": "River Trotters",
"postcode": "3370AA",
"vestpl": "Hardinxveld-Giessendam",
"nr": "2182"
 *
 */
class GamesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     *
     * date      : alleen wedstrijden ophalen die bijgewerkt zijn na deze datum.
    datum moet in formaat yyyy-mm-dd HH:MM:SS zijn
     */
    public function index()
    {
        $games = file_get_contents('http://db.basketball.nl/db/json/wedstrijd.pl?clb_ID=81');
        $games = json_decode($games);

        $filter = ['h1', 'h2', 'h3', 'd1'];

        $options = [ 1 => 'Thuis', 2 => 'Uit' ];

        $nbb = new Nbb();
        $home_games_this_weekends = $nbb->getThisWeek(true);

        //debug($home_games_this_weekends);

        $home_games_this_weekend = $home_games_this_weekends;
        foreach ($home_games_this_weekends as $game){

            //debug($game);
            //$nbb->getStatsComp($game->cmp_id);

        }

        //exit;

        $this->set(compact('games', 'filter', 'options', 'home_games_this_weekend'));
        $this->set('_serialize', ['games', 'filter', 'options']);
    }

    public function week($week_number = 2){

        $games = file_get_contents('http://db.basketball.nl/db/json/wedstrijd.pl?clb_ID=81');
        $games = json_decode($games);

        $date = $this->getStartAndEndDate(($week_number -1), 2017);

        $week = [];
        foreach ($games->wedstrijden as $game){
            if($game->datum == null){
                continue;
            }

            $unix_time = strtotime($game->datum);

            if($unix_time > strtotime($date[0]) AND $unix_time < strtotime($date[1])){
                $week[] = $game;
            }

        }

        $week_numbers = [2,3,4,5,6,7,8,9,10];

        $this->set(compact('week', 'week_numbers'));
        $this->set('_serialize', ['week']);
    }



    public function getStartAndEndDate($week, $year)
    {

        $time = strtotime("1 January $year", time());
        $day = date('w', $time);
        $time += ((7*$week)+1-$day)*24*3600;
        $return[0] = date('Y-n-j', $time);
        $time += 6*24*3600;
        $return[1] = date('Y-n-j', $time);
        return $return;
    }

    public function test(){

    }

}
