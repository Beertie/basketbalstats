<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Team Menu'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="teamMenus index large-9 medium-8 columns content">
    <h3><?= __('Team Menus') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modifed') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teamMenus as $teamMenu): ?>
            <tr>
                <td><?= $this->Number->format($teamMenu->id) ?></td>
                <td><?= h($teamMenu->name) ?></td>
                <td><?= h($teamMenu->created) ?></td>
                <td><?= h($teamMenu->modifed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $teamMenu->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $teamMenu->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $teamMenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamMenu->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
