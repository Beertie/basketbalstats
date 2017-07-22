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

        $cacheFilename = "standing" . $competitionId;

        if (($competition = $this->cache->read($cacheFilename)) === false) {

            $competition = json_decode(file_get_contents($scoreApiUrl));

            $this->cache->write($cacheFilename, $competition);
        }

        return $competition;

    }

}