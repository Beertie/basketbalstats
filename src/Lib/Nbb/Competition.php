<?php
/**
 * Created by PhpStorm.
 * User: beertie
 * Date: 3-5-17
 * Time: 22:38
 */

namespace App\Lib\Nbb;


use Cake\Cache\Cache;

class Competition extends Nbb
{

    /** @var \Cake\Cache\CacheEngine */
    public $cache;


    /**
     * Competition constructor.
     */
    public function __construct()
    {
        $this->cache = Cache::engine('competition');
    }

    /**
     * @param $competitionId
     *
     * @return mixed
     */
    public function getScoreByCompetitionId($competitionId)
    {

        $scoreApiUrl = $this->getStandingApiUrl($competitionId);

        $cacheFileName = "standing" . $competitionId;

        if (($competition = $this->cache->read($cacheFileName)) === false) {

            $competition = json_decode(file_get_contents($scoreApiUrl));

            $this->cache->write($cacheFileName, $competition);
        }

        return $competition;

    }

    public function getStatsByCompetitionId($competitionId)
    {

        $gameApiUrl = $this->getGameApiUl() ."?cmp_ID=".$competitionId;

        $cacheFileName = "score" . $competitionId;

        if (($stats = $this->cache->read($cacheFileName)) === false) {

            $score = json_decode(file_get_contents($gameApiUrl));

            $stats = $this->calculateStats($score, $competitionId);

            $this->cache->write($cacheFileName, $stats);
        }

        return $stats;
    }

    private function calculateStats($score, $competitionId)
    {
        $stats = [];
        $ignore_team_ids = $this->getNotActiveTeams($competitionId);

        foreach ($score->wedstrijden as $game) {
            if (in_array($game->thuis_ploeg_id, $ignore_team_ids) OR in_array($game->uit_ploeg_id, $ignore_team_ids)) {
                continue;
            }

            //If no score skip
            if ($game->score_thuis == 0 AND $game->score_uit == 0) {
                continue;
            }

            $stats[$game->thuis_ploeg_id]['name'] = $game->thuis_ploeg;
            $stats[$game->uit_ploeg_id]['name'] = $game->uit_ploeg;


            //Set defauls
            if (!isset($stats[$game->thuis_ploeg_id]['home']['win'])) {
                $stats[$game->thuis_ploeg_id]['home']['win'] = 0;
            }

            if (!isset($stats[$game->thuis_ploeg_id]['home']['lose'])) {
                $stats[$game->thuis_ploeg_id]['home']['lose'] = 0;
            }

            if (!isset($stats[$game->uit_ploeg_id]['away']['win'])) {
                $stats[$game->uit_ploeg_id]['away']['win'] = 0;
            }

            if (!isset($stats[$game->uit_ploeg_id]['away']['lose'])) {
                $stats[$game->uit_ploeg_id]['away']['lose'] = 0;
            }

            if (!isset($stats[$game->thuis_ploeg_id]['streak'])) {
                $stats[$game->thuis_ploeg_id]['streak'] = 0;
            }

            if (!isset($stats[$game->uit_ploeg_id]['streak'])) {
                $stats[$game->uit_ploeg_id]['streak'] = 0;
            }

            $home_win = true;
            if ($game->score_thuis < $game->score_uit) {
                $home_win = false;
            }


            if ($home_win) {

                //Count the wins and lose
                $stats[$game->thuis_ploeg_id]['home']['win'] = $stats[$game->thuis_ploeg_id]['home']['win'] + 1;
                $stats[$game->uit_ploeg_id]['away']['lose'] = $stats[$game->uit_ploeg_id]['away']['lose'] + 1;

                //Set last 5 record
                $stats[$game->thuis_ploeg_id]["last"][] = "W";
                $stats[$game->uit_ploeg_id]["last"][] = "L";

                //Set streak;
                //Winning team

                //IF home won and streak is negative or zero
                if ($stats[$game->thuis_ploeg_id]['streak'] <= 0) {

                    //Reset en set to 1
                    $stats[$game->thuis_ploeg_id]['streak'] = 1;
                } else {

                    //Else add 1
                    $stats[$game->thuis_ploeg_id]['streak'] = $stats[$game->thuis_ploeg_id]['streak'] + 1;
                }

                //Losing team
                if ($stats[$game->uit_ploeg_id]['streak'] > 0) {


                    $stats[$game->uit_ploeg_id]['streak'] = -1;
                } else {


                    $stats[$game->uit_ploeg_id]['streak'] = $stats[$game->uit_ploeg_id]['streak'] - 1;
                }


            } else {

                //Count the wins and lose
                $stats[$game->thuis_ploeg_id]['home']['lose'] = $stats[$game->thuis_ploeg_id]['home']['lose'] + 1;
                $stats[$game->uit_ploeg_id]['away']['win'] = $stats[$game->uit_ploeg_id]['away']['win'] + 1;

                //Set last 5 record
                $stats[$game->thuis_ploeg_id]["last"][] = "L";
                $stats[$game->uit_ploeg_id]["last"][] = "W";


                if ($stats[$game->uit_ploeg_id]['streak'] <= 0) {
                    $stats[$game->uit_ploeg_id]['streak'] = 1;

                } else {
                    $stats[$game->uit_ploeg_id]['streak'] = $stats[$game->uit_ploeg_id]['streak'] + 1;
                }


                //Losing team
                if ($stats[$game->thuis_ploeg_id]['streak'] > 0) {


                    $stats[$game->thuis_ploeg_id]['streak'] = -1;
                } else {


                    $stats[$game->thuis_ploeg_id]['streak'] = $stats[$game->thuis_ploeg_id]['streak'] - 1;
                }
            }

            /* $win= "Thuis wint";
             if($home_win){
                 $win= "UItwint";
             }

             echo $win ."<br />";
             echo "Thuis:".$game->thuis_ploeg_id ." " .$stats[$game->thuis_ploeg_id]['streak']."</br>";
             echo "UIt:". $game->uit_ploeg_id ." " .$stats[$game->uit_ploeg_id]['streak']."</br>";
             echo "<br />";*/


        }


        foreach ($stats as $team_id => $st) {

            $reversed = array_reverse($st['last']);

            //debug($reversed);
            $w = 0;
            $l = 0;

            for ($i = 0; $i <= 4; $i++) {
                //debug($reversed[$i]);
                if ($reversed[$i] == "W") {
                    $w = $w + 1;
                } else {
                    $l = $l + 1;
                }
            }

            $stats[$team_id]["home"] = $stats[$team_id]["home"]['win'] . "-" . $stats[$team_id]["home"]['lose'];
            $stats[$team_id]["away"] = $stats[$team_id]["away"]['win'] . "-" . $stats[$team_id]["away"]['lose'];

            if ($stats[$team_id]['streak'] > 0) {
                $stats[$team_id]['streak'] = "W " . $stats[$team_id]['streak'];
            }

            if ($stats[$team_id]['streak'] < 0) {
                $stats[$team_id]['streak'] = "L " . abs($stats[$team_id]['streak']);
            }

            $stats[$team_id]["L5"] = $w . "-" . $l;

        }

        return $stats;
    }

    /**
     * @param int $competitionId
     *
     * @return array
     */
    private function getNotActiveTeams($competitionId)
    {

        $comp_data = $this->getStatsComp($competitionId);
        $team_ids = [];
        foreach ($comp_data->stand as $team) {
            if ($team->status != 'Actief') {
                $team_ids[] = $team->ID;
            }
        }

        return $team_ids;
    }


}