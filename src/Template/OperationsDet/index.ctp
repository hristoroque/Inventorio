<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OperationsDet[]|\Cake\Collection\CollectionInterface $operationsDet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>        
        <li><?= $this->Html->link(__('Operations'), ['controller' => 'OperationsCab', 'action' => 'index']) ?></li>        
    </ul>
</nav>
<div class="operationsDet index large-9 medium-8 columns content">
    <h3><?= __('Operations Det') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('operation_cab_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('article_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($operationsDet as $operationsDet): ?>
            <tr>
                <td><?= $this->Number->format($operationsDet->id) ?></td>
                <td><?= $operationsDet->has('operations_cab') ? $this->Html->link($operationsDet->operations_cab->id, ['controller' => 'OperationsCab', 'action' => 'view', $operationsDet->operations_cab->id]) : '' ?></td>
                <td><?= $operationsDet->has('article') ? $this->Html->link($operationsDet->article->name, ['controller' => 'Articles', 'action' => 'view', $operationsDet->article->id]) : '' ?></td>
                <td><?= $this->Number->format($operationsDet->quantity) ?></td>
                <td><?= h($operationsDet->created) ?></td>
                <td><?= h($operationsDet->modified) ?></td>                
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
