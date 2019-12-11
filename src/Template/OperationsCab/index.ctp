<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OperationsCab[]|\Cake\Collection\CollectionInterface $operationsCab
 */
?>
<?php $this->start('navbar') ?>
        <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
            <a class="navbar-brand" href="./"><?=__("Return")?></a> 
        </nav>
<?php $this->end() ?>
<div class="row">
    <div class="col-sm-12">
        <h3><?= __('Operations') ?></h3>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('operation_type_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($operationsCab as $operationsCab): ?>
                <tr>
                    <td><?= $this->Number->format($operationsCab->id) ?></td>
                    <td><?= $operationsCab->has('user') ? $this->Html->link($operationsCab->user->name, ['controller' => 'Users', 'action' => 'view', $operationsCab->user->id]) : '' ?></td>
                    <td><?= h($operationsCab->operations_type->name) ?></td>
                    <td><?= h($operationsCab->created) ?></td>
                    <td><?= h($operationsCab->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $operationsCab->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $operationsCab->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $operationsCab->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationsCab->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
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
</div>