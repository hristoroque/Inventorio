<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OperationsCab $operationsCab
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Operations Cab'), ['action' => 'edit', $operationsCab->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Operations Cab'), ['action' => 'delete', $operationsCab->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationsCab->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Operations Cab'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operations Cab'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operations Types'), ['controller' => 'OperationsTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operations Type'), ['controller' => 'OperationsTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="operationsCab view large-9 medium-8 columns content">
    <h3><?= h($operationsCab->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $operationsCab->has('user') ? $this->Html->link($operationsCab->user->name, ['controller' => 'Users', 'action' => 'view', $operationsCab->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Operations Type') ?></th>
            <td><?= $operationsCab->has('operations_type') ? $this->Html->link($operationsCab->operations_type->name, ['controller' => 'OperationsTypes', 'action' => 'view', $operationsCab->operations_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($operationsCab->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($operationsCab->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($operationsCab->modified) ?></td>
        </tr>
    </table>
</div>
