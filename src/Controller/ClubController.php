<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Lib\Nbb\Club;
use App\Lib\Nbb\Nbb;
use App\Lib\Nbb\Teams;
use App\Model\Entity\Team;

/**
 * Clubs Controller
 *
 * @property \App\Model\Table\ClubsTable $Clubs
 */
class ClubController extends AppController
{

    //TODO set to global var for club id
    public $clubId = 81;

    /** @var  Club $clubController */
    public $clubController;

    /** @var Teams $teamController */
    public $teamController;

    public function initialize()
    {
        $this->clubController = new Club();
        $this->teamController = new Teams();
    }


    public function home()
    {
        $listOfClubs = $this->clubController->getListOfClubs();
        $clubs = [];
        foreach ($listOfClubs->clubs as $club) {
            $clubs[] = [
                'id' => $club->id,
                'name' => $club->naam,
                //TODO calc amount of teams
                'amountOfTeams' => 12,
                'location' => $club->vestpl
            ];
        }
        $this->set(compact('clubs'));
    }

    /**
     *  get overview of all clubs
     */
    public function index()
    {

        // get all teams
        $listOfTeams = $this->teamController->getListOfTeams();
        $listOfTeams = $this->teamController->getStandingForTeams($listOfTeams);

        //TODO merge dubbel teams as one row

        //TODO add more stats to teams pnt per game and

        //TODO cache the ranking of the teams to inmprove speed
        $this->set(compact('listOfTeams'));

    }

    public function stats()
    {
        //Get the club stats
        $club = new Club();


        //TODO test
        $clubData = $club->getClubById($this->clubId);

        debug($clubData);
        exit;

        $stats = $club->getClubStats();

        //$stats = ['test'];

        $this->set(compact('stats'));
        $this->set('_serialize', ['stats']);

    }
}
