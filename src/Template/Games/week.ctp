<div class="add-order-page">

    <nav id="actions">
        <div class="text-center">
            <?php
            for ($i = 1; $i < 10; $i++){
                echo '<a href="'. $this->Url->build(['action' => 'week', $i]).'" class="btn btn-default add-product">'. __("Week <br> $i").'</a>';
            }
            ?>
        </div>


    </nav>



    <div class="row add-order mb-0">

        <div class="col-md-12">

            <?php
            foreach ($week as $value){
            //debug($value);
            ?>

            <div class="col-md-3 col-md-offset-2 game">

                <div class="col-md-4 text-center">
                <?php
                echo $value->thuis_ploeg;
                if($value->score_uit != 0 AND $value->score_thuis != 0){
                    echo "<h1><b>".$value->score_thuis."</b></h1>";
                }

                ?>
                </div>


                <div class="col-md-4 text-center">
                    <h4><?php echo date("H:i", strtotime($value->datum));?></h4>

                    <?php echo date("Y-m-d", strtotime($value->datum));?>
                </div>


                <div class="col-md-4 text-center">
                    <?php
                    echo $value->uit_ploeg;
                    if($value->score_uit != 0 AND $value->score_thuis != 0){
                        echo "<h1><b>".$value->score_uit."</b></h1>";
                    }

                    ?>
                </div>
            </div>

            <?php } ?>

        </div>

    </div>



</div>