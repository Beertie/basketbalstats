<?php
/**
 * Created by PhpStorm.
 * User: beertie
 * Date: 3-5-17
 * Time: 22:38
 */

namespace App\Lib\Nbb;


class Teams extends Nbb
{

    public function getListOfTeams()
    {
        $teams = json_decode(file_get_contents($this->getTeamApiUrl()));

        return $teams->teams;
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
        $standing = json_decode(file_get_contents($this->getStandingApiUrl($compId)));

        return $standing->stand;

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
}