<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\KardexesCab $kardexesCab
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Kardexes Cab'), ['action' => 'edit', $kardexesCab->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Kardexes Cab'), ['action' => 'delete', $kardexesCab->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kardexesCab->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Kardexes Cab'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kardexes Cab'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="kardexesCab view large-9 medium-8 columns content">
    <h3><?= h($kardexesCab->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Article') ?></th>
            <td><?= $kardexesCab->has('article') ? $this->Html->link($kardexesCab->article->name, ['controller' => 'Articles', 'action' => 'view', $kardexesCab->article->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($kardexesCab->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Stock') ?></th>
            <td><?= $this->Number->format($kardexesCab->current_stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Balance') ?></th>
            <td><?= $this->Number->format($kardexesCab->current_balance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($kardexesCab->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($kardexesCab->modified) ?></td>
        </tr>
    </table>
</div>
