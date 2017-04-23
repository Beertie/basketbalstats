
<div id="page-title">
    <h1><?= __('News') ?></h1>
</div>

<nav id="actions">
    <a href="<?php echo $this->Url->build(['controller' => 'News', 'action' => 'add']); ?>" class="btn btn-default add-user"><span class="fa fa-plus"></span> <?php echo __("Add news"); ?></a>
</nav>

<div class="row">

    <div class="col-lg-12">

        <h2><span><?php echo __("News list"); ?></span></h2>

        <div class="panel-body">

            <div class="dataTable_wrapper">

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                    <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('insertion') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('phone_1') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('phone_2') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('membership') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('diploma') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('member_since') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('number') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($players as $player): ?>
                        <tr>
                            <td><?= h($player->first_name) ?></td>
                            <td><?= h($player->last_name) ?></td>
                            <td><?= h($player->insertion) ?></td>
                            <td><?= h($player->location) ?></td>
                            <td><?= h($player->phone_1) ?></td>
                            <td><?= h($player->phone_2) ?></td>
                            <td><?= h($player->date_of_birth) ?></td>
                            <td><?= h($player->membership) ?></td>
                            <td><?= h($player->diploma) ?></td>
                            <td><?= h($player->email) ?></td>
                            <td><?= h($player->status) ?></td>
                            <td><?= h($player->member_since) ?></td>
                            <td><?= h($player->number) ?></td>
                            <td class="actions">
                                <div class="btn-group" role="group">
                                    <a href="<?php echo $this->Url->build(['action' => 'edit', $player->id]); ?>" class="btn btn-default btn-sm edit"><?php echo __("Edit"); ?></a>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $player->id], ['class' => 'btn btn-default btn-sm delete', 'confirm' => __('Are you sure you want to delete '.h($player->name).'?', $player->id)]) ?>

                                </div>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

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
