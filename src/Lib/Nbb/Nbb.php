<?php

namespace App\Lib\Nbb;

use Cake\Cache\Cache;

class Nbb
{

    //Club id fo use for one club
    //TODO Need to set to global var en set at int of lib
    public $club_id = 81;

    /**
     * org_id : alleen de clubs van deze organisatie tonen (bijv. org_id=3 voor rayon oost)
     * date   : alleen clubs ophalen die bijgewerkt zijn na deze datum. datum moet in formaat yyyy-mm-dd HH:MM:SS zijn
     *
     * @var string
     */
    public $club_api_url = "http://db.basketball.nl/db/json/club.pl";

    /**
     * cmp_ID   : verplicht, dit is het ID van de competitie waarvan je de stand wilt ophalen
     * seizoen  : gegevens van ander seizoen dan het huidige ophalen, in formaat jaar-jaar, bijv. 2010-2012
     * szn_Naam : als alternatief om seizoen door te geven
     * datum    : stand per andere datum dan vandaag ophalen, datum in formaat yyyy-mm-dd , bijv. 2012-03-21
     *
     * @var string
     */
    public $stand_api_url = "http://db.basketball.nl/db/json/stand.pl";

    /**
     *  cmp_ID    : id van de competitie
     * clb_ID    : id van de club
     * loc_ID    : id van de locatie (sporthal)
     * date      : alleen wedstrijden ophalen die bijgewerkt zijn na deze datum.
     * datum moet in formaat yyyy-mm-dd HH:MM:SS zijn
     * seizoen   : gegevens van ander seizoen dan het huidige ophalen, in formaat jaar-jaar, bijv. 2010-2012
     * szn_Naam  : als alternatief om seizoen door te geven
     * plg_ID    : alleen de wedstrijden van dit ene team ophalen
     * wed_ID    : alleen de gegevens van deze ene wedstrijd ophalen
     *
     * @var string
     */
    public $games_api_url = "http://db.basketball.nl/db/json/wedstrijd.pl";

    /**
     * org_id : alleen de sporthallen van deze organisatie tonen (bijv. org_id=3 voor rayon oost)
     * date   : alleen sporthallen ophalen die bijgewerkt zijn na deze datum datum moet in formaat yyyy-mm-dd HH:MM:SS
     * zijn
     *
     * @var string
     */
    public $location_api_url = "http://db.basketball.nl/db/json/locatie.pl";

    /**
     * org_ID      : alleen de competities van deze organisatie tonen (bijv. org_id=3 voor rayon oost)
     * date        : alleen competities ophalen die bijgewerkt zijn na deze datum.
     * datum moet in formaat yyyy-mm-dd HH:MM:SS zijn
     * seizoen     : gegevens van ander seizoen dan het huidige ophalen, in formaat jaar-jaar, bijv. 2010-2012
     * clb_ID      : alleen competities tonen waar deze club in speelt
     * clb_ISSnum  : met ISS nummer van de club de lijst filteren tot competities waar deze club in speelt
     *
     * @var string
     */
    public $competition_api_url = "http://db.basketball.nl/db/json/competities.pl";

    /**
     * clb_ID   : verplicht, dit is het ID van de club waar je de teams van wilt ophalen
     * date     : alleen teams ophalen die bijgewerkt zijn na deze datum.
     * datum moet in formaat yyyy-mm-dd HH:MM:SS zijn
     * seizoen  : gegevens van ander seizoen dan het huidige ophalen, in formaat jaar-jaar, bijv. 2010-2012
     *
     * @var string
     */
    public $team_api_url = "http://db.basketball.nl/db/json/team.pl";

    /**
     * wed_ID  : verplicht, dit is het ID van de wedstrijd, zoals je in het schema / uitslagen overzicht kunt vinden
     *
     * @var string
     */
    public $stats_api_url = "http://db.basketball.nl/db/json/stats.pl";

    //TODO remove option of url
    //Set global api url
    public $url = "http://db.basketball.nl/db/json/wedstrijd.pl";

    /**
     * @return string api url
     */
    public function getTeamApiUrl()
    {
        return $this->team_api_url . "?clb_ID=" . $this->club_id;
    }

    /**
     * @return string
     */
    public function getClubApiUrl()
    {
        return $this->club_api_url;
    }

    /**
     * @param int $compId
     *
     * @return string
     */
    public function getStandingApiUrl($compId)
    {
        return $this->stand_api_url . "?cmp_ID=" . $compId;
    }

    /**
     * @return string
     */
    public function getGameApiUl()
    {
        return $this->games_api_url;
    }







    //TODO reset


    /**
     * Get all games of one seseon of teh select club sort bij date
     *
     * TODO
     * Add filters for teams
     * Add sort options for date
     * Add filters for played games
     *
     * @return mixed|string
     */
    public function getAllGames()
    {

        $games = file_get_contents($this->url);
        $games = json_decode($games);

        return $games;

    }

    /**
     *
     * Get all the games for the week for club
     *
     *
     * @param bool $home_game_only
     * @param null $week_number
     *
     * @return array
     */
    public function getThisWeek($home_game_only = false, $week_number = null)
    {

        //Get all games json
        $games = $this->getAllGames();

        //If no week number set get current number
        if ($week_number == null) {
            $week_number = $this->getWeekNumber();
        }

        //Get dates of the weeekend for the week number
        $date = $this->getStartAndEndDate(($week_number - 1), 2017);

        //Define week array
        $week = [];

        //For al games of the json file
        foreach ($games->wedstrijden as $game) {

            //If no date for game skip it
            if ($game->datum == null) {
                continue;
            }

            //Set time of game to unix time
            $unix_time = strtotime($game->datum);

            //Check is time is the range
            if ($unix_time > strtotime($date[0]) AND $unix_time < strtotime($date[1])) {

                //If only want home games skip all others
                if ($home_game_only AND $game->thuis_club_id != $this->club_id) {
                    continue;
                }
                $week[] = $game;
            }

        }

        return $week;

    }


    /**
     * Get game for competitons
     *
     * TODO
     * Add filter for played games
     * Add sortoptions for date
     *
     * @param $comp_id
     *
     * @return mixed|string
     */
    public function getCompetition($comp_id)
    {

        $comp = file_get_contents("http://db.basketball.nl/db/json/wedstrijd.pl?cmp_ID=$comp_id");
        $comp = json_decode($comp);

        return $comp;

    }


    public function getScore($comp_id, $year = false)
    {

        $url = "http://db.basketball.nl/db/json/stand.pl?cmp_ID=$comp_id";

        if ($year != false) {
            $url .= "&&seizoen=" . $year . "-" . ($year + 1);
        }

        $comp = file_get_contents($url);
        $comp = json_decode($comp);

        return $comp;
    }

    public function getNameComp($comp_id)
    {
        //TODO remove or cache hard

        $url = "http://db.basketball.nl/db/json/stand.pl?cmp_ID=" . $comp_id;
        $comp = json_decode(file_get_contents($url));

        return $comp->naam;
    }

    public function getFullTeamNameByComp($comp_id)
    {


        if (($teams = Cache::read('teams_' . $comp_id)) === false) {

            $url = "http://db.basketball.nl/db/json/stand.pl?cmp_ID=" . $comp_id;

            $comp = json_decode(file_get_contents($url));

            $teams = [];
            $teams['comp_name'] = $comp->naam;

            foreach ($comp->stand as $team) {
                $teams[$team->ID] = str_replace("(VR)", '', $team->team);
            }
            Cache::write('teams_' . $comp_id, $teams);
        }

        return $teams;
    }

    public function getResultByClub()
    {

        $url = "http://db.basketball.nl/db/json/wedstrijd.pl?clb_ID=" . $this->club_id;
        $results = json_decode(file_get_contents($url));

        //debug($results);exit;

        $games = [];
        foreach ($results->wedstrijden as $game) {
            if ($game->score_thuis != 0 AND $game->score_uit != 0) {

                $winner_home = 'winner';
                $winner_away = 'loser';
                if ($game->score_thuis < $game->score_uit) {
                    $winner_home = 'loser';
                    $winner_away = 'winner';
                }

                if ($game->score_thuis == $game->score_uit) {
                    $winner_home = 'winner';
                    $winner_away = 'winner';
                }

                $teams_name = $this->getFullTeamNameByComp($game->cmp_id);

                //debug($teams_name);


                $games[] = [
                    "home_team" => $game->thuis_ploeg,
                    "home_score" => $game->score_thuis,
                    "home_team_id" => $game->thuis_ploeg_id,
                    "home_team_name" => wordwrap($teams_name[$game->thuis_ploeg_id], 8, "<br />", false),
                    "home_club_id" => $game->thuis_club_id,
                    "away_team" => $game->uit_ploeg,
                    "away_score" => $game->score_uit,
                    "away_team_id" => $game->uit_ploeg_id,
                    "away_team_name" => wordwrap($teams_name[$game->uit_ploeg_id], 8, "<br />", false),
                    "away_club_id" => $game->uit_club_id,
                    "location" => $game->loc_plaats,
                    "place" => $game->loc_naam,
                    "date" => $game->datum,
                    "home_winner" => $winner_home,
                    "away_winner" => $winner_away,
                    "comp_name" => $teams_name['comp_name'],
                ];
            }
        }

        $games = array_reverse($games);
        $games = array_slice($games, 0, 15);

        return $games;
    }






    public function getStatsComp($comp_id)
    {
        $url = "http://db.basketball.nl/db/json/stand.pl?cmp_ID=$comp_id";

        $stats = file_get_contents($url);
        $stats = json_decode($stats);

        return $stats;


    }

    public function getStartAndEndDate($week, $year)
    {

        $time = strtotime("1 January $year", time());
        $day = date('w', $time);
        $time += ((7 * $week) + 1 - $day) * 24 * 3600;
        $return[0] = date('Y-n-j', $time);
        $time += 6 * 24 * 3600;
        $return[1] = date('Y-n-j', $time);

        return $return;
    }

    public function getWeekNumber()
    {
        $time = date("Y-m-d", time());
        $date = new \DateTime($time);
        $week = $date->format("W");

        return $week;
    }

    public function getGameOfTheWeek()
    {

        $url = "http://db.basketball.nl/db/json/wedstrijd.pl?clb_ID=" . $this->club_id;

        $games = json_decode(file_get_contents($url));

        $return_games = [];

        $weekNo = date('W');

        foreach ($games->wedstrijden as $game) {

            if ($game->score_thuis == 0 AND $game->score_uit == 0) {

                if (date('W', strtotime($game->datum)) == $weekNo) {


                    if ($game->thuis_club_id == $this->club_id) {
                        $return_games['thuis'][] = $game;
                    } else {
                        $return_games['uit'][] = $game;
                    }
                }

            }
        }


        //TODO select good game
        if (!empty($return_games['thuis'])) {
            $teams_name = $this->getFullTeamNameByComp($return_games['thuis'][0]->cmp_id);

            $team = [
                "home_team" => $return_games['thuis'][0]->thuis_ploeg,
                "home_team_name" => wordwrap($teams_name[$return_games['thuis'][0]->thuis_ploeg_id], 8, "<br />",
                    false),
                "away_team" => $return_games['thuis'][0]->uit_ploeg,
                "away_team_name" => wordwrap($teams_name[$return_games['thuis'][0]->uit_ploeg_id], 8, "<br />", false),
                "location" => $return_games['thuis'][0]->loc_plaats,
                "place" => $return_games['thuis'][0]->loc_naam,
                "date" => $return_games['thuis'][0]->datum,
                "comp_name" => $teams_name['comp_name'],
            ];

            //Select home game
            return $team;
        }

        if (!empty($return_games['uit'])) {

            $teams_name = $this->getFullTeamNameByComp($return_games['uit'][0]->cmp_id);

            //getFullTeamNameByComp
            $team = [
                "home_team" => $return_games['uit'][0]->thuis_ploeg,
                "home_team_name" => wordwrap($teams_name[$return_games['uit'][0]->thuis_ploeg_id], 8, "<br />", false),
                "away_team" => $return_games['uit'][0]->uit_ploeg,
                "away_team_name" => wordwrap($teams_name[$return_games['uit'][0]->uit_ploeg_id], 8, "<br />", false),
                "location" => $return_games['uit'][0]->loc_plaats,
                "place" => $return_games['uit'][0]->loc_naam,
                "date" => $return_games['uit'][0]->datum,
                "comp_name" => $teams_name['comp_name'],
            ];


            //Select home game
            return $team;
        }

        return false;
    }



}