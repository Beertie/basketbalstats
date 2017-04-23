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
                        <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('articleBody') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('author') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('liked') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('tag') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('team_id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($news as $news): ?>
                        <tr>
                            <td><?= h($news->title) ?></td>
                            <td><?= h($news->articleBody) ?></td>
                            <td><?= h($news->author) ?></td>
                            <td><?= h($news->liked) ?></td>
                            <td><?= h($news->tag) ?></td>
                            <td><?= h($news->team_id) ?></td>
                            <td class="actions">

                                <div class="btn-group" role="group">
                                    <a href="<?php echo $this->Url->build(['action' => 'edit', $news->id]); ?>" class="btn btn-default btn-sm edit"><?php echo __("Edit"); ?></a>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $news->id], ['class' => 'btn btn-default btn-sm delete', 'confirm' => __('Are you sure you want to delete '.h($news->name).'?', $news->id)]) ?>

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
