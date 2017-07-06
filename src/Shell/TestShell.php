<?php
namespace App\Shell;

use App\Lib\Nbb\Nbb;
use Cake\Cache\Cache;
use Cake\Console\Shell;

/**
 * Test shell command.
 */
class TestShell extends Shell
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int Success or error code.
     */
    public function main() 
    {
        $this->out($this->OptionParser->help());
    }

    public function name(){

        $nbb = new Nbb();

        $teams = $nbb->getFullTeamNameByComp(847);

        debug($teams);

    }

    public function game(){

        $nbb = new Nbb();

        $game = $nbb->getGameOfTheWeek();

    }

    public function cache(){
        $id = 1;


        if (($data = Cache::read('/test/test_'.$id)) === false) {

           $data = ['test', 'test'];

            Cache::write('/test/test_'.$id, $data);
        }

        return $data;
    }
}
