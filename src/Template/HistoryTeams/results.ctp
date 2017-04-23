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
            <li class="content-filter__item content-filter__item--active"><a href="/teams/results/<?= $team->id?>" class="content-filter__link"><small>Team</small>Uitslagen</a></li>
            <li class="content-filter__item "><a href="/teams/schedule/<?= $team->id?>" class="content-filter__link"><small>Team</small>Schema</a></li>
            <li class="content-filter__item "><a href="/teams/gallery/<?= $team->id?>" class="content-filter__link"><small>Team</small>Foto's</a></li>
        </ul>
    </div>
</nav>
<!-- Team Pages Filter / End -->