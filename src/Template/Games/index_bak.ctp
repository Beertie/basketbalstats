<div id="page-title">

    <h1><?= __('Wedstrijden') ?></h1>

</div>

<nav id="actions">

    <a href="<?php echo $this->Url->build(['controller' => 'Games', 'action' => 'msg']); ?>"
       class="btn btn-default add-product"> <?php echo __("Laatse week"); ?></a>
    <a href="<?php echo $this->Url->build(['controller' => 'Games', 'action' => 'msg']); ?>"
       class="btn btn-default add-product"> <?php echo __("Deze week"); ?></a>

</nav>

<div class="row with-image">

    <div class="col-lg-12">

        <h2><span><?php echo __("Filters"); ?></span><a
                href="<?php echo $this->Url->build(['controller' => 'Games', 'action' => 'index']); ?>"
                class="reset"> <?php echo __("Reset filters"); ?></a></h2>

        <div class="search">

            <label class='select-wrap'>
                <select class='form-control'>
                    <option>Select team:</option>
                    <?php
                    foreach ($filter as $id => $name) {
                        echo "<option value='?$key=$id'>$name</option>";
                    }
                    ?>

                </select>
            </label>

            <div class="search-input-wrap">
                <?php
                echo $this->Form->input('q', ['label' => false, 'placeholder' => __('Search')]);
                echo $this->Form->button(__('<span class="fa fa-search"></span>'), ['type' => 'submit']);
                ?>
            </div>
            <div class="checkbox-wrap status-filter">

                <div class="radio-toolbar-icon">
                    <div class="form-group multicheckbox">
                        <input type="hidden" name="status" value="">

                        <div class="checkbox">
                            <label for="status-481"><input type="checkbox" name="status[]" value="481" id="status-481">Thuis</label>
                        </div>
                        <div class="checkbox">
                            <label for="status-81"><input type="checkbox" name="status[]" value="81" id="status-81">Uit</label>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="panel-body mb-10">

        </div>

        <div class="panel-body">

            <table class="table table-striped table-bordered table-hover with-image">
                <thead>
                <tr>
                    <th>Time</th>
                    <th>Home</th>
                    <th>Away</th>
                    <th>Code</th>
                    <th>Where</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    $last_time = time();
                    //debug($last_time);
                    foreach ($games->wedstrijden as $game) {
                        //debug($game);
                        if ($game->datum == null) {
                            $other_games[] = $game;
                            continue;
                        }

                        $count_time = strtotime($game->datum) - $last_time;

                        //Create line for weekend
                        if ($count_time > 432000) {
                            //Set number of week

                            echo "<tr>";
                            echo "<td colspan='5'></td>";
                            echo "</tr>";
                            $last_time = strtotime($game->datum);
                            continue;
                        }


                        echo "<tr>";
                        echo "<td>" . date("Y-m-d H:i", strtotime($game->datum)) . "</td>";
                        echo "<td>" . $game->thuis_ploeg . "</td>";
                        echo "<td>" . $game->uit_ploeg . "</td>";
                        echo "<td>" . $game->id . "</td>";
                        echo "<td>" . $game->loc_plaats . "</td>";
                        echo "</tr>";
                        $last_time = strtotime($game->datum);
                    }

                    ?>
                </tr>
                </tbody>
            </table>

        </div>

    </div>

</div>

<div class="paginator">

    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>

    <p><?= $this->Paginator->counter() ?></p>

</div>


<div class="row">

    <div class="col-lg-12">

        <table class="table table-striped table-bordered table-hover with-image">
            <thead>
            <tr>
                <th>Time</th>
                <th>Home</th>
                <th>Away</th>
                <th>Code</th>
                <th>Where</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $last_time = time();
                //debug($last_time);
                foreach ($games->wedstrijden as $game) {
                    //debug($game);
                    if ($game->datum == null) {
                        $other_games[] = $game;
                        continue;
                    }

                    $count_time = strtotime($game->datum) - $last_time;

                    //Create line for weekend
                    if ($count_time > 432000) {
                        //Set number of week

                        echo "<tr>";
                        echo "<td></td>";
                        echo "</tr>";
                        $last_time = strtotime($game->datum);
                        continue;
                    }


                    echo "<tr>";
                    echo "<td>" . date("Y-m-d H:i", strtotime($game->datum)) . "</td>";
                    echo "<td>" . $game->thuis_ploeg . "</td>";
                    echo "<td>" . $game->uit_ploeg . "</td>";
                    echo "<td>" . $game->id . "</td>";
                    echo "<td>" . $game->loc_plaats . "</td>";
                    echo "</tr>";
                    $last_time = strtotime($game->datum);
                }

                ?>
            </tr>
            </tbody>
        </table>

    </div>
</div>
