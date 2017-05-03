<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Lib\Nbb\Clubs;

/**
 * Clubs Controller
 *
 * @property \App\Model\Table\ClubsTable $Clubs
 */
class ClubsController extends AppController
{

    public function index(){

        $clubs = new Clubs();

        $allClubs = $clubs->getAllClubs();

        debug($allClubs);

        exit;

    }

}
