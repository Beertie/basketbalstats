<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="teams form large-9 medium-8 columns content">
    <?= $this->Form->create($team) ?>
    <fieldset>
        <legend><?= __('Add Team') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('slug');
            echo $this->Form->input('nbb_id');
            echo $this->Form->input('comp_id_1');
            echo $this->Form->input('comp_id_2');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
