<?php

namespace App\Lib\Nbb;

use Cake\Cache\Cache;

class Club extends Nbb{

    public function getAllClubs(){

        $games = file_get_contents($this->url);
        $games = json_decode($games);

        return $games;

    }

    public function getClubById($clubId){

        $url = $this->club_api_url."?id=".$clubId;

        debug($url);

        $club = file_get_contents($url);
        $club = json_decode($club);
        return $club;
    }

    public function getClubStats(){



    }





}