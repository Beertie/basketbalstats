<div class="add-order-page">

    <div class="row add-order mb-0">

        <div class="col-md-12">

            <div class="col-md-7  col-md-offset-1">

                <div class="col-md-6">
                    <h1>Game of the weekend</h1>
                </div>

                <div class="col-md-6">

                    <h1>Stats</h1>
                </div>



            </div>

            <div class="col-md-3 text-center home-side-bar">

                <div class="col-md-12 home-side-top">
                    <div class="col-md-6">
                        <h2>Home</h2>
                    </div>
                    <div class="col-md-6">
                        <h2>All</h2>
                    </div>
                </div>
                <div class="col-md-12 home-side-top-2">
                <h2>Week 2</h2>
                </div>



                <?php
                foreach ($home_games_this_weekend as $game){?>
                    <div class="col-md-12 home-game">

                        <div class="col-md-4 text-center">
                            <?php
                            echo "Rivertrotters";
                            echo str_replace("River Trotters", "",$game->thuis_ploeg);
                            if($game->score_uit != 0 AND $game->score_thuis != 0){
                                echo "<h1><b>".$game->score_thuis."</b></h1>";
                            }

                            ?>
                        </div>


                        <div class="col-md-4 text-center">
                            <h4><b><?php echo date("H:i", strtotime($game->datum));?></b></h4>

                            <b><?php echo date("Y-m-d", strtotime($game->datum));?></b>
                        </div>


                        <div class="col-md-4 text-center">
                            <?php
                            echo $game->uit_ploeg;
                            if($game->score_uit != 0 AND $game->score_thuis != 0){
                                echo "<h1><b>".$game->score_uit."</b></h1>";
                            }

                            ?>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>

        </div>

    </div>



</div>