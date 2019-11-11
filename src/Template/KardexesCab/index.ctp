<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\KardexesCab[]|\Cake\Collection\CollectionInterface $kardexesCab
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Kardexes Cab'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="kardexesCab index large-9 medium-8 columns content">
    <h3><?= __('Kardexes Cab') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('article_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_balance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kardexesCab as $kardexesCab): ?>
            <tr>
                <td><?= $this->Number->format($kardexesCab->id) ?></td>
                <td><?= $kardexesCab->has('article') ? $this->Html->link($kardexesCab->article->name, ['controller' => 'Articles', 'action' => 'view', $kardexesCab->article->id]) : '' ?></td>
                <td><?= $this->Number->format($kardexesCab->current_stock) ?></td>
                <td><?= $this->Number->format($kardexesCab->current_balance) ?></td>
                <td><?= h($kardexesCab->created) ?></td>
                <td><?= h($kardexesCab->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $kardexesCab->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $kardexesCab->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $kardexesCab->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kardexesCab->id)]) ?>
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
