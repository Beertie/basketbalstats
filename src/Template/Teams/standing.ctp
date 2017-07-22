<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-heading__title">Full <span class="highlight">Stand</span></h1>
                <ol class="page-heading__breadcrumb breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="team-overview.html">The Team</a></li>
                    <li><a href="team-overview.html">Stand</a></li>
                    <li class="active"><?=$teamName?></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Team Pages Filter -->
<nav class="content-filter">
    <div class="container">
        <a href="#" class="content-filter__toggle"></a>
        <ul class="content-filter__list">
            <li class="content-filter__item "><a href="/teams/index/<?= $teamId?>" class="content-filter__link"><small>Team</small>Overview</a></li>
             <li class="content-filter__item content-filter__item--active"><a href="/teams/standing/<?= $teamId?>" class="content-filter__link"><small>Team</small>Stand</a></li>
            <li class="content-filter__item "><a href="/teams/results/<?= $teamId?>" class="content-filter__link"><small>Team</small>Latest Results</a></li>
            <li class="content-filter__item "><a href="/teams/schedule/<?= $teamId?>" class="content-filter__link"><small>Team</small>Schema</a></li>
            <li class="content-filter__item "><a href="/teams/gallery/<?= $teamId?>" class="content-filter__link"><small>Team</small>Gallery</a></li>
        </ul>
    </div>
</nav>
<!-- Team Pages Filter / End -->


<!-- Content
================================================== -->
<div class="site-content">
    <div class="container">

        <!-- Team Standings -->
        <div class="card card--has-table">
            <div class="card__header">
                <h4>Stand</h4>
            </div>
            <div class="card__content">
                <div class="table-responsive">
                    <table class="table table-hover table-standings table-standings--full">
                        <thead>
                        <tr>
                            <th class="team-standings__pos">Pos</th>
                            <th class="team-standings__team">Teams</th>
                            <th class="team-standings__win">W</th>
                            <th class="team-standings__lose">L</th>
                            <th class="team-standings__pct">PCT</th>
                            <th class="team-standings__gb">GB</th>
                            <th class="team-standings__home">Home</th>
                            <th class="team-standings__road">Road</th>
                            <th class="team-standings__ppg">PPG</th>
                            <th class="team-standings__op-ppg">OP PPG</th>
                            <th class="team-standings__diff">DIFF</th>
                            <th class="team-standings__strk">STRK</th>
                            <th class="team-standings__lead">L5</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($standings as $key => $value){?>



                            <?php
                            /*
                             * 	afko => 'B.C. Virtus HS 1'
	ID => '3020'
	status => 'Actief'
	rang => '1'
	gespeeld => '12'
	percentage => '91.7'
	tegenscore => '748'
	punten => '22'
	eigenscore => '909'
	datum => '2016-12-09'
	team => 'B.C. Virtus Heren 1'
	saldo => (int) 161
	positie => '1'
                             *
                             */
                            //debug($value);exit;
                            ?>


                        <tr>
                            <td class="team-standings__pos"><?= $value['Pos'] ?></td>
                            <td class="team-standings__team">
                                <div class="team-meta">
                                    <div class="team-meta__info">
                                        <h6 class="team-meta__name"><?= $value['Name']?></h6>

                                    </div>
                                </div>
                            </td>
                            <td class="team-standings__win"><?= $value['W']?></td>
                            <td class="team-standings__lose"><?= $value['L'] ?></td>
                            <td class="team-standings__pct"><?= $value['PCT']?></td>
                            <td class="team-standings__gb"><?= $value['GB']?></td>
                            <td class="team-standings__home"><?= $value['home']?></td>
                            <td class="team-standings__road"><?= $value['road']?></td>
                            <td class="team-standings__ppg"><?= round($value['PPG'])?></td>
                            <td class="team-standings__op-ppg"><?= round($value['OP PPG'])?></td>
                            <td class="team-standings__diff"><?= (round($value['PPG']) - round($value['OP PPG']))?></td>
                            <td class="team-standings__strk"><?= $value['streak']?></td>
                            <td class="team-standings__lead"><?= $value['L5']?></td>
                        </tr>
                       <?php }?>
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