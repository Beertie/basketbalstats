<!-- Page Heading
 ================================================== -->
<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-heading__title"><span class="highlight">Uitslagen</span></h1>
                <ol class="page-heading__breadcrumb breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="team-overview.html">Team</a></li>
                    <li><a href="team-overview.html">Uitslagen</a></li>
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
             <li class="content-filter__item "><a href="/teams/standing/<?= $teamId?>" class="content-filter__link"><small>Team</small>Stand</a></li>
            <li class="content-filter__item content-filter__item--active"><a href="/teams/results/<?= $teamId?>" class="content-filter__link"><small>Team</small>Uitslagen</a></li>
            <li class="content-filter__item "><a href="/teams/schedule/<?= $teamId?>" class="content-filter__link"><small>Team</small>Schema</a></li>
        </ul>
    </div>
</nav>
<!-- Team Pages Filter / End -->
<!-- Content
================================================== -->
<div class="site-content">
    <div class="container">

        <!-- Team Latest Results -->
        <div class="card card--has-table">
            <div class="card__header card__header--has-btn">
                <h4>Uitslagen</h4>
                <!-- Result Filter -->
                <ul class="team-result-filter">

                    <li class="team-result-filter__item">
                        <select class="form-control input-xs">
                            <option>Ascending</option>
                            <option>Descending</option>
                        </select>
                    </li>
                    <li class="team-result-filter__item">
                        <button type="submit" class="btn btn-default btn-outline btn-xs card-header__button">Filter Latest Results</button>
                    </li>
                </ul>
                <!-- Result Filter / End -->
            </div>
            <div class="card__content">
                <div class="table-responsive">
                    <table class="table table-hover team-result">
                        <thead>
                        <tr>
                            <th class="team-result__date">Date</th>
                            <th class="team-result__vs">Versus</th>
                            <th class="team-result__score">Score</th>
                            <th class="team-result__status">Status</th>
                            <th class="team-result__points">Location</th>
                            <th class="team-result__points">Plaats</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($results->wedstrijden as $game){?>

                        <?php
                            if($game->score_thuis == 0 AND $game->score_uit == 0){
                                continue;
                            }
                            $i = "W";
                            $home = "Thuis";
                            $vs = $game->uit_ploeg;

                            if($teamId != $game->thuis_ploeg_id){
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

                        <tr>
                            <td class="team-result__date"><?= date("Y-m-d", strtotime($game->datum))?></td>
                            <td class="team-schedule__versus"><?= $vs?></td>
                            <td class="team-result__score"><span class="team-result__game"><?= $i?></span> <?= $game->score_thuis?>-<?= $game->score_uit?></td>
                            <td class="team-result__status"><?= $home ?></td>
                            <td class="team-result__points"><?= $game->loc_naam ?></td>
                            <td class="team-result__points"><?= $game->loc_plaats ?></td>
                        </tr>

                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Team Latest Results / End -->

    </div>
</div>

<!-- Content / End -->
