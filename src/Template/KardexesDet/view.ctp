<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\KardexesDet $kardexesDet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Kardexes Det'), ['action' => 'edit', $kardexesDet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Kardexes Det'), ['action' => 'delete', $kardexesDet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kardexesDet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Kardexes Det'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kardexes Det'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Kardexes Cab'), ['controller' => 'KardexesCab', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kardexes Cab'), ['controller' => 'KardexesCab', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="kardexesDet view large-9 medium-8 columns content">
    <h3><?= h($kardexesDet->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Kardexes Cab') ?></th>
            <td><?= $kardexesDet->has('kardexes_cab') ? $this->Html->link($kardexesDet->kardexes_cab->id, ['controller' => 'KardexesCab', 'action' => 'view', $kardexesDet->kardexes_cab->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($kardexesDet->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entry Amount') ?></th>
            <td><?= $this->Number->format($kardexesDet->entry_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entry Unit Price') ?></th>
            <td><?= $this->Number->format($kardexesDet->entry_unit_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entry Total Price') ?></th>
            <td><?= $this->Number->format($kardexesDet->entry_total_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Output Amount') ?></th>
            <td><?= $this->Number->format($kardexesDet->output_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Output Unit Price') ?></th>
            <td><?= $this->Number->format($kardexesDet->output_unit_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Output Total Price') ?></th>
            <td><?= $this->Number->format($kardexesDet->output_total_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Existence Current Stock') ?></th>
            <td><?= $this->Number->format($kardexesDet->existence_current_stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Existence Current Balance') ?></th>
            <td><?= $this->Number->format($kardexesDet->existence_current_balance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($kardexesDet->date) ?></td>
        </tr>
    </table>
</div>
