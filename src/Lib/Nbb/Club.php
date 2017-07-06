<?php

namespace App\Lib\Nbb;

use Cake\Cache\Cache;

class Club extends Nbb
{

    public function getListOfClubs()
    {
        return json_decode(file_get_contents($this->getClubApiUrl()));

    }

    public function getClubById($clubId)
    {

        $url = $this->club_api_url . "?id=" . $clubId;

        debug($url);

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