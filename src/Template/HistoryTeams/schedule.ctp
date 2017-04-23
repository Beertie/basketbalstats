<!-- Page Heading
================================================== -->
<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-heading__title">Schema</span></h1>
                <ol class="page-heading__breadcrumb breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="team-overview.html">Team</a></li>
                    <li><a href="team-overview.html">Schema</a></li>
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
            <li class="content-filter__item "><a href="/teams/index/<?= $team->id?>" class="content-filter__link"><small>Team</small>Overview</a></li>
            <li class="content-filter__item "><a href="/teams/roster/<?= $team->id?>" class="content-filter__link"><small>Team</small>Spelers</a></li>
            <li class="content-filter__item "><a href="/teams/standing/<?= $team->id?>" class="content-filter__link"><small>Team</small>Stand</a></li>
            <li class="content-filter__item "><a href="/teams/results/<?= $team->id?>" class="content-filter__link"><small>Team</small>Uitslagen</a></li>
            <li class="content-filter__item content-filter__item--active"><a href="/teams/schedule/<?= $team->id?>" class="content-filter__link"><small>Team</small>Schema</a></li>
            <li class="content-filter__item "><a href="/teams/gallery/<?= $team->id?>" class="content-filter__link"><small>Team</small>Foto's</a></li>
        </ul>
    </div>
</nav>
<!-- Team Pages Filter / End -->


<!-- Content
================================================== -->
<div class="site-content">
    <div class="container">

        <!-- Schedule & Tickets -->
        <div class="card card--has-table">
            <div class="card__header">
                <h4>Schedule and Tickets</h4>
            </div>
            <div class="card__content">
                <div class="table-responsive">
                    <table class="table table-hover team-schedule team-schedule--full">
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
                        <?php foreach ($schedule as $game){ ?>
                            <?php
                            $home = "Thuis";
                            $vs = $game->uit_ploeg;
                            if($team->nbb_id != $game->thuis_ploeg_id){
                                $home = "Uit";
                                $vs = $game->thuis_ploeg;

                            }


/*
 * object(stdClass) {
	loc_id => '22'
	lat => '51.8253351'
	thuis_club_id => '81'
	cmp_id => '428'
	uit_ploeg_id => '2867'
	id => '733365'
	nr => 'FA'
	loc_naam => 'De Wielewaal'
	cmp_nr => 'LHS1DB'
	score_uit => '0'
	loc_plaats => 'Hardinxveld-G'
	stats => '0'
	score_thuis => '0'
	org_id => '1'
	thuis_ploeg_id => '714'
	uit_club_id => '279'
	thuis_ploeg => 'River Trotters HS 1'
	uit_ploeg => 'TSBV Pendragon HS 1'
	lon => '4.8361204'
	datum => '2017-03-04 20:30:00.000'
}
 */
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

        <div class="text-right">
            <!-- Team Pagination -->
            <nav class="team-pagination">
                <ul class="pagination">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><span>...</span></li>
                    <li><a href="#">16</a></li>
                </ul>
            </nav>
            <!-- Team Pagination / End -->

        </div>
    </div>
</div>
