<?php
/**
 * Created by PhpStorm.
 * User: beertie
 * Date: 3-5-17
 * Time: 22:38
 */

namespace App\Lib\Nbb;


use Cake\Cache\Cache;

class Teams extends Nbb
{

    public $cache;


    public function __construct()
    {
        $this->cache = Cache::engine('teams');
    }

    public function getListOfTeams()
    {

        if (($data = $this->cache->read($this->getTeamApiUrl())) === false) {

            $data = json_decode(file_get_contents($this->getTeamApiUrl()));

            $data = $data->teams;

            $this->cache->write($this->getTeamApiUrl(), $data);
        }

        return $data;

    }

    /**
     * @param array $listOfTeams
     *
     * @return array
     */
    public function getStandingForTeams($listOfTeams)
    {
        foreach ($listOfTeams as $key => $team) {

            if (!isset($team->comp_id) OR !isset($team->id)) {
                continue;
            }
            $standArray = $this->getListOfStand($team->comp_id);

            $listOfTeams[$key]->rank = $this->getRankOfTeamsFromStanding($standArray, $team->id);
        }

        return $listOfTeams;
    }

    /**
     * @param int $compId
     *
     * @return array
     */
    public function getListOfStand($compId)
    {
        if (($standing = $this->cache->read($this->getStandingApiUrl($compId))) === false) {

            $standing = json_decode(file_get_contents($this->getStandingApiUrl($compId)));

            $standing = $standing->stand;

            $this->cache->write($this->getStandingApiUrl($compId), $standing);
        }

        return $standing;
    }

    /**
     * @param array $standing
     * @param int   $teamId
     *
     * @return int rang
     */
    public function getRankOfTeamsFromStanding($standing, $teamId)
    {
        foreach ($standing as $team) {

            if ($team->ID == $teamId) {
                return $team->rang;
            }
        }

        return 0;
    }

    /**
     * @param array $listOfTeams
     *
     * @return array listOfTeams
     */
    public function getCompInfoByTeams($listOfTeams)
    {

        return $listOfTeams;
    }



    public function getTeamById($id){

    }
}