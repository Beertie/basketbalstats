
<script type="text/javascript">
    $(function () {

        var obj = <?php echo json_encode($score_home, true); ?>;

        console.log(obj)

        //Better to construct options first and then pass it as a parameter
        var options = {
            animationEnabled: true,
            data: [
                {
                    type: "spline", //change it to line, area, column, pie, etc
                    dataPoints: obj
                }
            ]
        };

        $("#chartContainer").CanvasJSChart(options);

    });
</script>

<!-- Page Heading
 ================================================== -->
<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-heading__title"><span class="highlight"><?=$teamName?></span></h1>
                <ol class="page-heading__breadcrumb breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="team-overview.html">The Teams</a></li>
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
            <li class="content-filter__item content-filter__item--active"><a href="#" class="content-filter__link"><small>Team</small>Overview</a></li>
            <li class="content-filter__item "><a href="/teams/standing/<?= $teamId?>" class="content-filter__link"><small>Team</small>Stand</a></li>
            <li class="content-filter__item "><a href="/teams/results/<?= $teamId?>" class="content-filter__link"><small>Team</small>Uitslagen</a></li>
            <li class="content-filter__item "><a href="/teams/schedule/<?= $teamId?>" class="content-filter__link"><small>Team</small>Schema</a></li>
            <li class="content-filter__item "><a href="/teams/gallery/<?= $teamId?>" class="content-filter__link"><small>Team</small>Foto's</a></li>
        </ul>
    </div>
</nav>
<!-- Team Pages Filter / End -->


<!-- Content
================================================== -->
<div class="site-content">
    <div class="container">

        <div class="row">

            <!-- Content -->
            <div class="content col-md-8">

                <!-- Schedule & Tickets -->
                <div class="card card--has-table">
                    <div class="card__header card__header--has-btn">
                        <h4>Games Schedule</h4>
                        <a href="/teams/schedule/<?= $teamId?>" class="btn btn-default btn-outline btn-xs card-header__button">See Complete Schedule</a>
                    </div>
                    <div class="card__content">
                        <div class="table-responsive">
                            <table class="table table-hover team-schedule">
                                <thead>
                                <tr>
                                    <th class="team-schedule__date">Date</th>
                                    <th class="team-schedule__versus">Versus</th>
                                    <th class="team-schedule__status">Status</th>
                                    <th class="team-schedule__time">Time</th>
                                    <th class="team-schedule__venue">Venue</th>
                                    <th class="team-schedule__tickets">Tickets</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($schedule as $key => $game){?>

                                    <?php

                                    ?>


                                    <tr>
                                        <td class="team-schedule__date"><?= date("Y-m-d", strtotime($game->datum))?></td>
                                        <td class="team-schedule__versus"><?= $vs?></td>
                                        <td class="team-schedule__status"><?= $home?></td>
                                        <td class="team-schedule__time"><?= date("H:i", strtotime($game->datum))?></td>
                                        <td class="team-schedule__venue"><?= $game->loc_naam?></td>
                                        <td class="team-schedule__tickets"><a href="#" class="btn btn-xs btn-default btn-outline btn-block">Buy Game Tickets</a></td>
                                    </tr>

                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Schedule & Tickets / End -->

                <!-- Points History -->
                <div class="card">
                    <div class="card__header card__header--has-btn">
                        <h4>Points History</h4>
                        <a href="team-schedule.html" class="btn btn-default btn-outline btn-xs card-header__button">See Complete History</a>
                    </div>
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                </div>
                <!-- Points History / End -->

            </div>
            <!-- Content / End -->

            <!-- Sidebar -->
            <div class="sidebar col-md-4">

                <!-- Widget: Standings -->
                <aside class="widget card widget--sidebar widget-standings">
                    <div class="widget__title card__header card__header--has-btn">
                        <h4>Standings</h4>
                        <a href="#" class="btn btn-default btn-outline btn-xs card-header__button">See All Stats</a>
                    </div>
                    <div class="widget__content card__content">
                        <div class="table-responsive">
                            <table class="table table-hover table-standings">
                                <thead>
                                <tr>
                                    <th>P</th>
                                    <th>Team naam</th>
                                    <th>W</th>
                                    <th>D</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($stand->stand as $team_stand){?>
                                    <?php

                                    //debug($team);exit;
                                    ?>

                                    <tr>
                                        <td><?= $team_stand->rang?></td>
                                        <td>
                                            <div class="team-meta">
                                                <div class="team-meta__info">
                                                    <h6 class="team-meta__name"><?= $team_stand->team?></h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td><?= ($team_stand->punten / 2)?></td>
                                        <td><?= $team_stand->saldo?></td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </aside>
                <!-- Widget: Standings / End -->


                <!-- Widget: Latest Results -->
                <aside class="widget card widget--sidebar widget-results">
                    <div class="widget__title card__header card__header--has-btn">
                        <h4>Latest Results</h4>
                        <a href="#" class="btn btn-default btn-outline btn-xs card-header__button">See Full Results</a>
                    </div>
                    <div class="widget__content card__content">
                        <ul class="widget-results__list">

                            <?php
                                $results = $results->wedstrijden;

                                $results = array_reverse($results);


                                $counter = 0;
                                foreach ($results as $key => $game){


                                //debug($team);exit;

                                if($game->score_thuis == 0 AND $game->score_uit == 0){
                                    continue;
                                }

                                if($counter == 3){
                                    break;
                                }
                                $counter++;

                                $i = "W";
                                $home = "Thuis";
                                $vs = $game->uit_ploeg;

                                if($team->nbb_id != $game->thuis_ploeg_id){
                                    $home = "Uit";
                                    $vs = $game->thuis_ploeg;

                                    if($game->score_uit < $game->score_thuis){
                                        $i= "L";
                                    }
                                }else{
                                    if($game->score_thuis < $game->score_uit){
                                        $i= "L";
                                    }
                                }

                            ?>

                            <!-- Game 1 -->
                            <li class="widget-results__item">
                                <h5 class="widget-results__title"><?= date("Y-m-d", strtotime($game->datum))?></h5>
                                <div class="widget-results__content">
                                    <div class="widget-results__team widget-results__team--first">

                                        <div class="widget-results__team-details">
                                            <h5 class="widget-results__team-name"><?= $game->thuis_ploeg ?></h5>
                                        </div>
                                    </div>
                                    <div class="widget-results__result">
                                        <div class="widget-results__score">
                                            <span class="team-result__game"><?= $i?></span> <?= $game->score_thuis?> - <?= $game->score_uit?>
                                            <div class="widget-results__status"><?= $home ?></div>
                                        </div>
                                    </div>
                                    <div class="widget-results__team widget-results__team--second">

                                        <div class="widget-results__team-details">
                                            <h5 class="widget-results__team-name"><?= $game->uit_ploeg ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Game 1 / End -->

                            <?php }?>

                        </ul>
                    </div>
                </aside>
                <!-- Widget: Latest Results / End -->


            </div>
            <!-- Sidebar / End -->
        </div>
    </div>
</div>

<!-- Content / End -->

<script>
    function draw() {
        var canvas = document.getElementById('canvas');
        if (canvas.getContext) {
            var ctx = canvas.getContext('2d');

            ctx.beginPath();
            ctx.moveTo(75, 50);
            ctx.lineTo(100, 75);
            ctx.lineTo(100, 25);
            ctx.fill();
        }
    }

</script>