<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Team Menu'), ['action' => 'edit', $teamMenu->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Team Menu'), ['action' => 'delete', $teamMenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamMenu->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Team Menus'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team Menu'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="teamMenus view large-9 medium-8 columns content">
    <h3><?= h($teamMenu->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($teamMenu->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($teamMenu->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($teamMenu->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifed') ?></th>
            <td><?= h($teamMenu->modifed) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Teams') ?></h4>
        <?php if (!empty($teamMenu->teams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Nbb Id') ?></th>
                <th scope="col"><?= __('Comp Id 1') ?></th>
                <th scope="col"><?= __('Comp Id 2') ?></th>
                <th scope="col"><?= __('Team Menu Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($teamMenu->teams as $teams): ?>
            <tr>
                <td><?= h($teams->id) ?></td>
                <td><?= h($teams->name) ?></td>
                <td><?= h($teams->slug) ?></td>
                <td><?= h($teams->nbb_id) ?></td>
                <td><?= h($teams->comp_id_1) ?></td>
                <td><?= h($teams->comp_id_2) ?></td>
                <td><?= h($teams->team_menu_id) ?></td>
                <td><?= h($teams->created) ?></td>
                <td><?= h($teams->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Teams', 'action' => 'view', $teams->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Teams', 'action' => 'edit', $teams->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Teams', 'action' => 'delete', $teams->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teams->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
