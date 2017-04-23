<div id="page-title">

    <h1><?= __('Teams') ?></h1>

</div>

<nav id="actions">
    <a href="#" class="btn btn-default add-user"><span class="fa fa-plus"></span> <?php echo __("Syc Team"); ?></a>
</nav>

<div class="row">

    <div class="col-lg-12">

        <h2><span><?php echo __("Team list"); ?></span></h2>

        <div class="panel-body">

            <div class="dataTable_wrapper">

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('name') ?></th>
                        <th><?= $this->Paginator->sort('comp 1') ?></th>
                        <th><?= $this->Paginator->sort('Comp 2') ?></th>
                        <th><?= $this->Paginator->sort('NBB ID') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($teams as $team): ?>
                        <tr>
                            <td><?= h($team->name) ?></td>
                            <td><?= h($team->comp_id_1) ?></td>
                            <td><?= h($team->comp_id_2) ?></td>
                            <td><?= h($team->nbb_id) ?></td>
                            <td class="actions">
                                <div class="btn-group" role="group">
                                    <a href="<?php echo $this->Url->build(['action' => 'edit', $team->id]); ?>" class="btn btn-default btn-sm edit"><?php echo __("Edit"); ?></a>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $team->id], ['class' => 'btn btn-default btn-sm delete', 'confirm' => __('Are you sure you want to delete '.h($team->name).'?', $team->id)]) ?>

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