<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Team'), ['action' => 'edit', $team->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Team'), ['action' => 'delete', $team->id], ['confirm' => __('Are you sure you want to delete # {0}?', $team->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="teams view large-9 medium-8 columns content">
    <h3><?= h($team->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($team->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($team->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($team->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nbb Id') ?></th>
            <td><?= $this->Number->format($team->nbb_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comp Id 1') ?></th>
            <td><?= $this->Number->format($team->comp_id_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comp Id 2') ?></th>
            <td><?= $this->Number->format($team->comp_id_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($team->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($team->modified) ?></td>
        </tr>
    </table>
</div>
