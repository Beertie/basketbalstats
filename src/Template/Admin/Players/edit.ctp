<div id="page-title">

    <h1><?= __('Edit PLayer') ?></h1>

</div>

<nav id="actions">

    <a href="<?php echo $this->Url->build(['action' => 'index']); ?>" class="btn btn-default"><span class="fa fa-chevron-left"></span> <?php echo __("PLayer"); ?></a>
    <?= $this->Form->postLink(
        __('Delete this Uer'),
        ['action' => 'delete', $player->id],
        ['class' => 'btn btn-danger delete', 'confirm' => __('Are you sure you want to delete '.$player->first_name.'?', $player->id)]
    )
    ?>

</nav>

<h2><span><?php echo __('Edit User') ?></span></h2>


<div class="row users">

    <div class="col-md-7">

        <div class="form-horizontal">

            <?= $this->Form->create($player, ['align' => [
                'md' => [
                    'left' => 2,
                    'middle' => 10
                ]
            ]]) ?>

            <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('insertion');
            echo $this->Form->input('location');
            echo $this->Form->input('phone_1');
            echo $this->Form->input('phone_2');
            echo $this->Form->input('date_of_birth');
            echo $this->Form->input('membership');
            echo $this->Form->input('diploma');
            echo $this->Form->input('email');
            echo $this->Form->input('status');
            echo $this->Form->input('member_since');
            echo $this->Form->input('number');
            echo $this->Form->input('team_id', ['class' => 'form-control', 'options' => $teams ]);
            ?>

            <div class="form-group">

                <div class="col-sm-offset-2 col-sm-10">

                    <?php echo $this->Form->button(__('Submit'), ['class' => 'btn btn-default']); ?>

                </div>

            </div>

            <?= $this->Form->end() ?>

        </div>

    </div>

</div>