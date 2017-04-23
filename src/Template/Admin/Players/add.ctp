<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Players'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Teams Has Players'), ['controller' => 'TeamsHasPlayers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Teams Has Player'), ['controller' => 'TeamsHasPlayers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="players form large-9 medium-8 columns content">
    <?= $this->Form->create($player) ?>
    <fieldset>
        <legend><?= __('Add Player') ?></legend>
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
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
