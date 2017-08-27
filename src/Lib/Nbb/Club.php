<?php

namespace App\Lib\Nbb;

use Cake\Cache\Cache;

class Club extends Nbb
{

    /**
     * @var \Cake\Cache\CacheEngine
     */
    public $cache;

    /**
     * Teams constructor.
     */
    public function __construct()
    {
        $this->cache = Cache::engine('clubs');
    }

    /**
     * Get a list of all clubs
     *
     * @return mixed
     */
    public function getListOfClubs()
    {
        $cacheFileName = "allclubs";

        if (($allClubs = $this->cache->read($cacheFileName)) === false) {
            $allClubs = json_decode(file_get_contents($this->getClubApiUrl()));
            $allClubs = $allClubs->clubs;
            $this->cache->write($cacheFileName, $allClubs);
        }

        return $allClubs;


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