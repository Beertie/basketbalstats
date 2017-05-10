<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Lib\Nbb\Club;
use App\Lib\Nbb\Nbb;

/**
 * Clubs Controller
 *
 * @property \App\Model\Table\ClubsTable $Clubs
 */
class ClubsController extends AppController
{

    //TODO set to global var for club id
    public $clubId = 81;

    /**
     *  get overview of all clubs
     */
    public function index(){

        $nbb = new Nbb();

    }

    /**
     * select a club to global var
     */
    public function select(){

    }

    /**
     * Change the global club id
     */
    public function change(){

    }

    public function stats(){
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
