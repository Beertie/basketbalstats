<!-- Page Heading
 ================================================== -->
<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-heading__title"><span class="highlight"><?=$team->name?></span></h1>
                <ol class="page-heading__breadcrumb breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="team-overview.html">The Teams</a></li>
                    <li class="active"><?=$team->name?></li>
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
            <li class="content-filter__item content-filter__item--active"><a href="team-overview.html" class="content-filter__link"><small>Team</small>Overview</a></li>
            <li class="content-filter__item "><a href="/teams/roster/<?= $team->id?>" class="content-filter__link"><small>Team</small>Spelers</a></li>
            <li class="content-filter__item "><a href="/teams/standing/<?= $team->id?>" class="content-filter__link"><small>Team</small>Stand</a></li>
            <li class="content-filter__item "><a href="/teams/results/<?= $team->id?>" class="content-filter__link"><small>Team</small>Uitslagen</a></li>
            <li class="content-filter__item "><a href="/teams/schedule/<?= $team->id?>" class="content-filter__link"><small>Team</small>Schema</a></li>
            <li class="content-filter__item "><a href="/teams/gallery/<?= $team->id?>" class="content-filter__link"><small>Team</small>Foto's</a></li>
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

                <!-- Team Roster: Table -->
                <div class="card card--has-table">
                    <div class="card__header card__header--has-btn">
                        <h4>Main Roster</h4>
                        <a href="team-roster-2.html" class="btn btn-default btn-outline btn-xs card-header__button">See Complete Roster</a>
                    </div>
                    <div class="card__content">
                        <div class="table-responsive">
                            <table class="table table--lg team-roster-table">
                                <thead>
                                <tr>
                                    <th class="team-roster-table__number">NBR</th>
                                    <th class="team-roster-table__name">Player Name</th>
                                    <th class="team-roster-table__position hidden-xs hidden-sm">Position</th>
                                    <th class="team-roster-table__age">Age</th>
                                    <th class="team-roster-table__height">Height</th>
                                    <th class="team-roster-table__weight">Weight</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="team-roster-table__number">38</td>
                                    <td class="team-roster-table__name">Games Girobili</td>
                                    <td class="team-roster-table__position hidden-xs hidden-sm">1st Shooting Guard</td>
                                    <td class="team-roster-table__age">18</td>
                                    <td class="team-roster-table__height">6'66"</td>
                                    <td class="team-roster-table__weight">205 lbs</td>
                                    <td class="team-roster-table__college hidden-xs hidden-sm">South Beach College</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Team Roster: Table / End -->

                <!-- Schedule & Tickets -->
                <div class="card card--has-table">
                    <div class="card__header card__header--has-btn">
                        <h4>Games Schedule</h4>
                        <a href="team-schedule.html" class="btn btn-default btn-outline btn-xs card-header__button">See Complete Schedule</a>
                    </div>
                    <div class="card__content">
                        <div class="table-responsive">
                            <table class="table table-hover team-schedule">
                                <thead>
                                <tr>
                                    <th class="team-schedule__date">Date</th>
                                    <th class="team-schedule__versus">Versus</th>
                                    <th class="team-schedule__time">Time</th>
                                    <th class="team-schedule__venue">Venue</th>
                                    <th class="team-schedule__tickets">Tickets</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="team-schedule__date">Saturday, Mar 24</td>
                                    <td class="team-schedule__versus">
                                        <div class="team-meta">
                                            <figure class="team-meta__logo">
                                                <img src="assets/images/samples/logos/lucky_clovers_shield.png" alt="">
                                            </figure>
                                            <div class="team-meta__info">
                                                <h6 class="team-meta__name">Lucky Clovers</h6>
                                                <span class="team-meta__place">St. Patrick’s Institute</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="team-schedule__time">9:00PM EST</td>
                                    <td class="team-schedule__venue">Madison Cube Stadium</td>
                                    <td class="team-schedule__tickets"><a href="#" class="btn btn-xs btn-default btn-outline btn-block">Buy Game Tickets</a></td>
                                </tr>
                                <tr>
                                    <td class="team-schedule__date">Friday, May 31</td>
                                    <td class="team-schedule__versus">
                                        <div class="team-meta">
                                            <figure class="team-meta__logo">
                                                <img src="assets/images/samples/logos/red_wings_shield.png" alt="">
                                            </figure>
                                            <div class="team-meta__info">
                                                <h6 class="team-meta__name">Red Wings</h6>
                                                <span class="team-meta__place">Icarus College</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="team-schedule__time">9:30PM EST</td>
                                    <td class="team-schedule__venue">Alchemists Stadium</td>
                                    <td class="team-schedule__tickets"><a href="#" class="btn btn-xs btn-default btn-outline btn-block disabled">Sold Out</a></td>
                                </tr>
                                <tr>
                                    <td class="team-schedule__date">Saturday, May 8</td>
                                    <td class="team-schedule__versus">
                                        <div class="team-meta">
                                            <figure class="team-meta__logo">
                                                <img src="assets/images/samples/logos/draconians_shield.png" alt="">
                                            </figure>
                                            <div class="team-meta__info">
                                                <h6 class="team-meta__name">Draconians</h6>
                                                <span class="team-meta__place">Wyvern College</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="team-schedule__time">10:00PM EST</td>
                                    <td class="team-schedule__venue">Scalding Rock Stadium</td>
                                    <td class="team-schedule__tickets"><a href="#" class="btn btn-xs btn-default btn-outline btn-block">Buy Game Tickets</a></td>
                                </tr>
                                <tr>
                                    <td class="team-schedule__date">Friday, May 14</td>
                                    <td class="team-schedule__versus">
                                        <div class="team-meta">
                                            <figure class="team-meta__logo">
                                                <img src="assets/images/samples/logos/aqua_keyes_shield.png" alt="">
                                            </figure>
                                            <div class="team-meta__info">
                                                <h6 class="team-meta__name">Aqua Keyes</h6>
                                                <span class="team-meta__place">Pacific Institute</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="team-schedule__time">10:00PM EST</td>
                                    <td class="team-schedule__venue">Alchemists Stadium</td>
                                    <td class="team-schedule__tickets"><a href="#" class="btn btn-xs btn-default btn-outline btn-block">Buy Game Tickets</a></td>
                                </tr>
                                <tr>
                                    <td class="team-schedule__date">Saturday, May 22</td>
                                    <td class="team-schedule__versus">
                                        <div class="team-meta">
                                            <figure class="team-meta__logo">
                                                <img src="assets/images/samples/logos/icarus_wings_shield.png" alt="">
                                            </figure>
                                            <div class="team-meta__info">
                                                <h6 class="team-meta__name">Icarus Wings</h6>
                                                <span class="team-meta__place">Waxer College</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="team-schedule__time">10:30PM EST</td>
                                    <td class="team-schedule__venue">The FireStar Arena</td>
                                    <td class="team-schedule__tickets"><a href="#" class="btn btn-xs btn-default btn-outline btn-block disabled">Sold Out</a></td>
                                </tr>
                                <tr>
                                    <td class="team-schedule__date">Saturday, May 29</td>
                                    <td class="team-schedule__versus">
                                        <div class="team-meta">
                                            <figure class="team-meta__logo">
                                                <img src="assets/images/samples/logos/bloody_wave_shield.png" alt="">
                                            </figure>
                                            <div class="team-meta__info">
                                                <h6 class="team-meta__name">Bloody Wave</h6>
                                                <span class="team-meta__place">Atlantic School</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="team-schedule__time">9:00PM EST</td>
                                    <td class="team-schedule__venue">Alchemists Stadium</td>
                                    <td class="team-schedule__tickets"><a href="#" class="btn btn-xs btn-default btn-outline btn-block">Buy Game Tickets</a></td>
                                </tr>
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
                    <div class="card__content" onload="draw();">
                        <canvas id="canvas"  height="135"></canvas>
                    </div>
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
                                <?php foreach ($stand->stand as $team){?>
                                    <?php

                                    //debug($team);exit;
                                    ?>

                                    <tr>
                                        <td><?= $team->rang?></td>
                                        <td>
                                            <div class="team-meta">
                                                <div class="team-meta__info">
                                                    <h6 class="team-meta__name"><?= $team->team?></h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td><?= ($team->punten / 2)?></td>
                                        <td><?= $team->saldo?></td>
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

                            <!-- Game 1 -->
                            <li class="widget-results__item">
                                <h5 class="widget-results__title">Saturday, March 24</h5>
                                <div class="widget-results__content">
                                    <div class="widget-results__team widget-results__team--first">
                                        <figure class="widget-results__team-logo">
                                            <img src="assets/images/samples/logos/alchemists_b_shield.png" alt="">
                                        </figure>
                                        <div class="widget-results__team-details">
                                            <h5 class="widget-results__team-name">Alchemists</h5>
                                            <span class="widget-results__team-info">Elric Bros School</span>
                                        </div>
                                    </div>
                                    <div class="widget-results__result">
                                        <div class="widget-results__score">
                                            <span class="widget-results__score-winner">107</span> - <span class="widget-results__score-loser">102</span>
                                            <div class="widget-results__status">Home</div>
                                        </div>
                                    </div>
                                    <div class="widget-results__team widget-results__team--second">
                                        <figure class="widget-results__team-logo">
                                            <img src="assets/images/samples/logos/sharks_shield.png" alt="">
                                        </figure>
                                        <div class="widget-results__team-details">
                                            <h5 class="widget-results__team-name">Sharks</h5>
                                            <span class="widget-results__team-info">Marine College</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Game 1 / End -->

                            <!-- Game 2 -->
                            <li class="widget-results__item">
                                <h5 class="widget-results__title">Friday, March 16</h5>
                                <div class="widget-results__content">
                                    <div class="widget-results__team widget-results__team--first">
                                        <figure class="widget-results__team-logo">
                                            <img src="assets/images/samples/logos/pirates_shield.png" alt="">
                                        </figure>
                                        <div class="widget-results__team-details">
                                            <h5 class="widget-results__team-name">L.A. Pirates</h5>
                                            <span class="widget-results__team-info">Bebop Institute</span>
                                        </div>
                                    </div>
                                    <div class="widget-results__result">
                                        <div class="widget-results__score">
                                            <span class="widget-results__score-winner">124</span> - <span class="widget-results__score-loser">106</span>
                                            <div class="widget-results__status">Away</div>
                                        </div>
                                    </div>
                                    <div class="widget-results__team widget-results__team--second">
                                        <figure class="widget-results__team-logo">
                                            <img src="assets/images/samples/logos/alchemists_b_shield.png" alt="">
                                        </figure>
                                        <div class="widget-results__team-details">
                                            <h5 class="widget-results__team-name">Alchemists</h5>
                                            <span class="widget-results__team-info">Eric Bros School</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Game 2 / End -->

                            <!-- Game 3 -->
                            <li class="widget-results__item">
                                <h5 class="widget-results__title">Saturday, March 10</h5>
                                <div class="widget-results__content">
                                    <div class="widget-results__team widget-results__team--first">
                                        <figure class="widget-results__team-logo">
                                            <img src="assets/images/samples/logos/alchemists_b_shield.png" alt="">
                                        </figure>
                                        <div class="widget-results__team-details">
                                            <h5 class="widget-results__team-name">Alchemists</h5>
                                            <span class="widget-results__team-info">Eric Bros School</span>
                                        </div>
                                    </div>
                                    <div class="widget-results__result">
                                        <div class="widget-results__score">
                                            <span class="widget-results__score-loser">95</span> - <span class="widget-results__score-winner">98</span>
                                            <div class="widget-results__status">Home</div>
                                        </div>
                                    </div>
                                    <div class="widget-results__team widget-results__team--second">
                                        <figure class="widget-results__team-logo">
                                            <img src="assets/images/samples/logos/lucky_clovers_shield.png" alt="">
                                        </figure>
                                        <div class="widget-results__team-details">
                                            <h5 class="widget-results__team-name">Clovers</h5>
                                            <span class="widget-results__team-info">St. Patrick’s Inst</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Game 3 / End -->

                            <!-- Game 4 -->
                            <li class="widget-results__item">
                                <h5 class="widget-results__title">Friday, March 4</h5>
                                <div class="widget-results__content">
                                    <div class="widget-results__team widget-results__team--first">
                                        <figure class="widget-results__team-logo">
                                            <img src="assets/images/samples/logos/ocean_kings_shield.png" alt="">
                                        </figure>
                                        <div class="widget-results__team-details">
                                            <h5 class="widget-results__team-name">Ocean Kings</h5>
                                            <span class="widget-results__team-info">Bay College</span>
                                        </div>
                                    </div>
                                    <div class="widget-results__result">
                                        <div class="widget-results__score">
                                            <span class="widget-results__score-winner">110</span> - <span class="widget-results__score-loser">104</span>
                                            <div class="widget-results__status">Home</div>
                                        </div>
                                    </div>
                                    <div class="widget-results__team widget-results__team--second">
                                        <figure class="widget-results__team-logo">
                                            <img src="assets/images/samples/logos/alchemists_b_shield.png" alt="">
                                        </figure>
                                        <div class="widget-results__team-details">
                                            <h5 class="widget-results__team-name">Alchemists</h5>
                                            <span class="widget-results__team-info">Eric Bros School</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Game 4 / End -->

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