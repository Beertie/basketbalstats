<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Team Menus'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="teamMenus form large-9 medium-8 columns content">
    <?= $this->Form->create($teamMenu) ?>
    <fieldset>
        <legend><?= __('Add Team Menu') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('modifed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
