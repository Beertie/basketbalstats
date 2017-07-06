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
        return json_decode(file_get_contents($this->getTeamApiUrl()));
    }
}