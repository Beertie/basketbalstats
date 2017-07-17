<!-- Content
================================================== -->
<div class="site-content">
    <div class="container">

        <!-- Team Standings -->
        <div class="card card--has-table">
            <div class="card__header">
                <h4>Playoffs Standings</h4>
            </div>
            <div class="card__content">
                <div class="table-responsive">
                    <table class="table table-hover table-standings table-standings--full">
                        <thead>
                        <tr>
                            <th class="team-standings__team">Teams</th>
                            <th class="team-standings__pos">Pos</th>
                            <th class="team-standings__win">W</th>
                            <th class="team-standings__lose">L</th>
                            <th class="team-standings__pct">PCT</th>
                            <th class="team-standings__gb">GB</th>
                            <th class="team-standings__home">Home</th>
                            <th class="team-standings__road">Road</th>
                            <th class="team-standings__div">Div</th>
                            <th class="team-standings__ppg">PPG</th>
                            <th class="team-standings__op-ppg">OP PPG</th>
                            <th class="team-standings__diff">DIFF</th>
                            <th class="team-standings__strk">STRK</th>
                            <th class="team-standings__lead">L10</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach ($listOfTeams as $team){
                            //debug($team);
                            ?>
                            <tr>
                                <td class="team-standings__team"><?= $team->naam ?></td>
                                <td class="team-standings__pos"><?= $team->rank ?></td>
                                <td class="team-standings__win">45</td>
                                <td class="team-standings__lose">5</td>
                                <td class="team-standings__pct">.695</td>
                                <td class="team-standings__gb">0</td>
                                <td class="team-standings__home">33-8</td>
                                <td class="team-standings__road">24-17</td>
                                <td class="team-standings__div">8-8</td>
                                <td class="team-standings__ppg">104.3</td>
                                <td class="team-standings__op-ppg">98.3</td>
                                <td class="team-standings__diff">+ 6.0</td>
                                <td class="team-standings__strk">L 1</td>
                                <td class="team-standings__lead">6-4</td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Team Standings / End -->

        <!-- Team Glossary -->
        <div class="card">
            <div class="card__header">
                <h4>Glossary</h4>
            </div>
            <div class="card__content">
                <div class="glossary">
                    <div class="glossary__item"><span class="glossary__abbr">W:</span> Wins</div>
                    <div class="glossary__item"><span class="glossary__abbr">GB:</span> Game Back</div>
                    <div class="glossary__item"><span class="glossary__abbr">DIV:</span> Division Record</div>
                    <div class="glossary__item"><span class="glossary__abbr">DIFF:</span> Average Point Differential</div>
                    <div class="glossary__item"><span class="glossary__abbr">L:</span> Losses</div>
                    <div class="glossary__item"><span class="glossary__abbr">Home:</span> Home Record</div>
                    <div class="glossary__item"><span class="glossary__abbr">PPG:</span> Points per Game</div>
                    <div class="glossary__item"><span class="glossary__abbr">STRK:</span> Current Streak</div>
                    <div class="glossary__item"><span class="glossary__abbr">PCT:</span> Winning Percentages</div>
                    <div class="glossary__item"><span class="glossary__abbr">Road:</span> Road Record</div>
                    <div class="glossary__item"><span class="glossary__abbr">OPP PPG:</span> Opponent Points per Game</div>
                    <div class="glossary__item"><span class="glossary__abbr">L10:</span> Record Last 10 Games</div>
                </div>
            </div>
        </div>
        <!-- Team Glossary / End -->

    </div>
</div>

<!-- Content / End -->