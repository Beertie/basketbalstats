<?php
namespace App\Shell;

use App\Lib\Nbb\Club;
use Cake\Console\Shell;

/**
 * Club shell command.
 */
class ClubShell extends Shell
{

    public function getClubStats(){

        $club = new Club();

        $club->getClubStats();
    }
}
