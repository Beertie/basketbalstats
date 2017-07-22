<?php

namespace App\Lib\Nbb;

use Cake\Cache\Cache;

class Club extends Nbb
{

    public function getListOfClubs()
    {
        $cacheObj = Cache::engine('clubs');//define cache obj

        if (($data = $cacheObj->read($this->getClubApiUrl())) === false) {

            $data = json_decode(file_get_contents($this->getClubApiUrl()));;

            $cacheObj->write($this->getClubApiUrl(), $data);
        }

        return $data;


    }

    public function getClubById($clubId)
    {

        $url = $this->club_api_url . "?id=" . $clubId;

        $club = file_get_contents($url);
        $club = json_decode($club);

        return $club;
    }

    public function getClubStats()
    {

        $statsArray = [];

        //Get all games of a year
        $games = json_decode(file_get_contents($this->games_api_url . "?clb_ID=" . $this->club_id));
        debug($games);

        $statsArray['totalTeams'] = $this->countTeams();

    }

    public function getTeams()
    {

        //Get all team of this club
        $teams = json_decode(file_get_contents($this->team_api_url . "?clb_ID=" . $this->club_id));

        return $teams->teams;

    }

    public function countTeams()
    {

        $teams = $this->getTeams();

        $teamCountArray = [];
        foreach ($teams as $team) {

            if (!in_array($team->naam, $teamCountArray)) {
                $teamCountArray[] = $team->naam;
            }
        }

        debug($teamCountArray);

        debug(count($teamCountArray));

    }


}