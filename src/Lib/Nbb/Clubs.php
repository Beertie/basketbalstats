<?php
/**
 * Created by PhpStorm.
 * User: beertie
 * Date: 3-5-17
 * Time: 22:38
 */

namespace App\Lib\Nbb;


class Clubs extends Nbb
{

    public $club_url = "http://db.basketball.nl/db/json/club.pl";

    public function getAllClubs(){

        return json_decode(file_get_contents($this->club_url));

    }

    public function getNameClub($club_id){

    }



}