<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\KardexesDet[]|\Cake\Collection\CollectionInterface $kardexesDet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Kardexes Det'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Kardexes Cab'), ['controller' => 'KardexesCab', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kardexes Cab'), ['controller' => 'KardexesCab', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="kardexesDet index large-9 medium-8 columns content">
    <h3><?= __('Kardexes Det') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kardex_cab_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entry_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entry_unit_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entry_total_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('output_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('output_unit_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('output_total_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('existence_current_stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('existence_current_balance') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kardexesDet as $kardexesDet): ?>
            <tr>
                <td><?= $this->Number->format($kardexesDet->id) ?></td>
                <td><?= $kardexesDet->has('kardexes_cab') ? $this->Html->link($kardexesDet->kardexes_cab->id, ['controller' => 'KardexesCab', 'action' => 'view', $kardexesDet->kardexes_cab->id]) : '' ?></td>
                <td><?= h($kardexesDet->date) ?></td>
                <td><?= $this->Number->format($kardexesDet->entry_amount) ?></td>
                <td><?= $this->Number->format($kardexesDet->entry_unit_price) ?></td>
                <td><?= $this->Number->format($kardexesDet->entry_total_price) ?></td>
                <td><?= $this->Number->format($kardexesDet->output_amount) ?></td>
                <td><?= $this->Number->format($kardexesDet->output_unit_price) ?></td>
                <td><?= $this->Number->format($kardexesDet->output_total_price) ?></td>
                <td><?= $this->Number->format($kardexesDet->existence_current_stock) ?></td>
                <td><?= $this->Number->format($kardexesDet->existence_current_balance) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $kardexesDet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $kardexesDet->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $kardexesDet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kardexesDet->id)]) ?>
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
