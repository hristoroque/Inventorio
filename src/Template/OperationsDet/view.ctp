<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OperationsDet $operationsDet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Operations Det'), ['action' => 'edit', $operationsDet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Operations Det'), ['action' => 'delete', $operationsDet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationsDet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Operations Det'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operations Det'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operations Cab'), ['controller' => 'OperationsCab', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operations Cab'), ['controller' => 'OperationsCab', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="operationsDet view large-9 medium-8 columns content">
    <h3><?= h($operationsDet->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Operations Cab') ?></th>
            <td><?= $operationsDet->has('operations_cab') ? $this->Html->link($operationsDet->operations_cab->id, ['controller' => 'OperationsCab', 'action' => 'view', $operationsDet->operations_cab->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Article') ?></th>
            <td><?= $operationsDet->has('article') ? $this->Html->link($operationsDet->article->name, ['controller' => 'Articles', 'action' => 'view', $operationsDet->article->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($operationsDet->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($operationsDet->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($operationsDet->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($operationsDet->modified) ?></td>
        </tr>
    </table>
</div>
