<!-- Page Heading
================================================== -->
<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-heading__title">Uitslagen</h1>
                <ol class="page-heading__breadcrumb breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Uitslagen</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Post Filter -->
<div class="post-filter">
    <div class="container">
        <form action="#" class="post-filter__form clearfix">
            <div class="post-filter__select">
                <label class="post-filter__label">Category</label>
                <select class="cs-select cs-skin-border">
                    <option value="" disabled selected>All Articles</option>
                    <option value="all">All Articles</option>
                    <option value="team">The Team</option>
                    <option value="playoffs">Playoffs</option>
                    <option value="injuries">Injuries</option>
                </select>
            </div>
            <div class="post-filter__select">
                <label class="post-filter__label">Filter By</label>
                <select class="cs-select cs-skin-border">
                    <option value="" disabled selected>Article Date</option>
                    <option value="date">Article Date</option>
                    <option value="id">Article ID</option>
                    <option value="comments">Last Comments</option>
                    <option value="random">Random</option>
                </select>
            </div>
            <div class="post-filter__select">
                <label class="post-filter__label">Order</label>
                <select class="cs-select cs-skin-border">
                    <option value="" disabled selected>Ascending</option>
                    <option value="ascending">Ascending</option>
                    <option value="descending">Descending</option>
                </select>
            </div>
            <div class="post-filter__select">
                <label class="post-filter__label">Author</label>
                <select class="cs-select cs-skin-border">
                    <option value="" disabled selected>All Authors</option>
                    <option value="all">All Authors</option>
                    <option value="author1">James Spiegel</option>
                    <option value="author2">Jessica Hoops</option>
                    <option value="author3">Mark Johnson</option>
                </select>
            </div>
            <div class="post-filter__submit">
                <button type="submit" class="btn btn-default btn-lg btn-block">Filter News</button>
            </div>
        </form>
    </div>
</div>
<!-- Post Filter / End -->


<!-- Content
================================================== -->
<div class="site-content">
    <div class="container">

        <div class="row">
            <!-- Content -->
            <div class="content col-md-12">

                <!-- Posts Grid -->
                <div class="posts posts--cards post-grid post-grid--masonry row">

                    <?php

                    foreach ($results as $game){

                        //debug($game);exit;
                        ?>
                        <div class="post-grid__item col-sm-4">
                            <!-- Widget: Game Result - Small -->
                            <aside class="widget card widget--sidebar widget-game-result">
                                <div class="widget__content card__content">
                                    <!-- Game Score -->
                                    <div class="widget-game-result__section">
                                        <div class="widget-game-result__section-inner">
                                            <header class="widget-game-result__header">
                                                <div class="widget-game-result__score-label"><?= $game['comp_name']?></div>
                                                <time class="widget-game-result__date" datetime="2016-03-24"><?= date("Y-m-d H:i", strtotime($game['date']))?></time>
                                            </header>

                                            <div class="widget-game-result__main">
                                                <!-- 1st Team -->
                                                <div class="widget-game-result__team widget-game-result__team--first">

                                                    <div class="widget-game-result__team-info">
                                                        <h5 class="widget-game-result__team-name"><?= $game['home_team_name']?></h5>
                                                    </div>
                                                </div>
                                                <!-- 1st Team / End -->

                                                <div class="widget-game-result__score-wrap">
                                                    <div class="widget-game-result__score">
                                                        <span class="widget-game-result__score-result widget-game-result__score-result--<?= $game['home_winner']?>"><?= $game['home_score']?></span>
                                                        <span class="widget-game-result__score-dash">-</span>
                                                        <span class="widget-game-result__score-result widget-game-result__score-result--<?= $game['away_winner']?>"><?= $game['away_score']?></span>
                                                    </div>
                                                    <div class="widget-game-result__score-label"><?= $game['place']?></div>
                                                    <div class="widget-game-result__score-label"><?= $game['location']?></div>
                                                </div>

                                                <!-- 2nd Team -->
                                                <div class="widget-game-result__team widget-game-result__team--second">
                                                    <div class="widget-game-result__team-info">
                                                        <h5 class="widget-game-result__team-name"><?= $game['away_team_name']?></h5>
                                                    </div>
                                                </div>
                                                <!-- 2nd Team / End -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Game Score / End -->

                                </div>
                            </aside>
                            <!-- Widget: Game Result - Small / End -->

                        </div>
                    <?php }?>

                </div>
                <!-- Post Grid / End -->

            </div>
            <!-- Content / End -->


        </div>

    </div>
</div>

<!-- Content / End -->
