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

    /**
     * @var \Cake\Cache\CacheEngine
     */
    public $cache;

    /**
     * Teams constructor.
     */
    public function __construct()
    {
        $this->cache = Cache::engine('teams');
    }

    public function getTeamNameByTeamsId($teamId)
    {

        $cacheFileName = "team_name_" . $teamId;
        $gameApiUrl = $this->getGameApiUl() . "?plg_ID=" . $teamId;

        if (($teamName = $this->cache->read($cacheFileName)) === false) {

            $games = json_decode(file_get_contents($gameApiUrl));
            foreach ($games->wedstrijden as $game) {
                if ($game->thuis_ploeg_id == $teamId) {
                    $teamName = $game->thuis_ploeg;
                    break;
                }
            }
            $this->cache->write($cacheFileName, $teamName);
        }

        return $teamName;

    }

    /**
     * @return array
     */
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
     * @param int $teamId
     *
     * @return int competitionId
     */
    public function getCompetitionIdByTeamId($teamId)
    {
        $gameApiUrl = $this->getGameApiUl() . "?plg_ID=" . $teamId;
        $cacheFilename = "team_competition_id_" . $teamId;

        if (($competitionId = $this->cache->read($cacheFilename)) === false) {
            $competition = json_decode(file_get_contents($gameApiUrl));

            foreach ($competition->wedstrijden as $key => $game) {
                $competitionId = $game->cmp_id;
                break;
            }
            $this->cache->write($cacheFilename, $competitionId);
        }

        return $competitionId;
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


    /**
     * @param int $teamId
     *
     * @return array
     */
    public function getScheduleByTeamId($teamId)
    {

        $gameApiUrl = $this->getGameApiUl() . "?plg_ID=" . $teamId;
        $cacheFilename = "team_schedule_" . $teamId;

        if (($schedule = $this->cache->read($cacheFilename)) === false) {
            $competition = json_decode(file_get_contents($gameApiUrl));
            $schedule = [];
            foreach ($competition->wedstrijden as $key => $game) {

                if ($game->thuis_ploeg_id == $teamId OR $game->uit_ploeg_id == $teamId) {

                    if ($game->score_thuis == 0 AND $game->score_uit == 0) {
                        $schedule[] = $game;
                    }

                }

            }

            $this->cache->write($cacheFilename, $schedule);
        }

        return $schedule;
    }

    /**
     * @param int $teamId
     *
     * @return object
     */
    public function getResultsByTeam($teamId)
    {
        $gameApiUrl = $this->getGameApiUl() . "?plg_ID=" . $teamId;
        $cacheFilename = "team_results_" . $teamId;

        if (($results = $this->cache->read($cacheFilename)) === false) {
            $results = json_decode(file_get_contents($gameApiUrl));
            $this->cache->write($cacheFilename, $results);
        }

        return $results;


    }

}