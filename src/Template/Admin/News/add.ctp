<div id="page-title">

    <h1><?= __('Add news') ?></h1>

</div>

<nav id="actions">

    <a href="<?php echo $this->Url->build(['controller' => 'News', 'action' => 'index']); ?>" class="btn btn-default"><span class="fa fa-chevron-left"></span> <?php echo __("News"); ?></a>

</nav>

<h2><span><?php echo __('Add News') ?></span></h2>

<div class="row users">

    <div class="col-md-7">

        <div class="form-horizontal">

            <?= $this->Form->create($news, ['align' => [
                'md' => [
                    'left' => 2,
                    'middle' => 10
                ]
            ]]) ?>
            <?php
            echo $this->Form->input('title', [ 'class' => 'form-control' ]);
            echo $this->Form->input('articleBody', ['class' => 'form-control' , "type" => 'textarea']);
            echo $this->Form->input('author', [ 'class' => 'form-control' ]);
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