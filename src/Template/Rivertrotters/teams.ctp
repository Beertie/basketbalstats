<!-- Page Heading
 ================================================== -->
<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-heading__title"><span class="highlight">Teams</span></h1>
                <ol class="page-heading__breadcrumb breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Teams</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Content
================================================== -->
<div class="site-content">
    <div class="container">

        <!-- Team Latest Results -->
        <div class="card card--has-table">
            <div class="card__header card__header--has-btn">
                <h4>Teams</h4>
            </div>
            <div class="card__content">
                <div class="table-responsive">
                    <table class="table table-hover team-result">
                        <thead>
                        <tr>
                            <th class="team-result__date">Team</th>
                            <th class="team-result__vs">Link</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($teams as $team){
                            //debug($team);exit;
                        ?>

                            <tr>
                                <td class="team-result__points"><?= $team->name ?></td>
                                <td class="team-schedule__tickets"><a href="/teams/index/<?= $team->id ?>" class="btn btn-xs btn-default btn-outline btn-block">Ga naar team</a></td>
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
