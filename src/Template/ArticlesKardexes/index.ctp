<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesKardex[]|\Cake\Collection\CollectionInterface $articlesKardexes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Articles Kardex'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Kardexes'), ['controller' => 'Kardexes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kardex'), ['controller' => 'Kardexes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articlesKardexes index large-9 medium-8 columns content">
    <h3><?= __('Articles Kardexes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('article_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kardex_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resgistry') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articlesKardexes as $articlesKardex): ?>
            <tr>
                <td><?= $this->Number->format($articlesKardex->id) ?></td>
                <td><?= $articlesKardex->has('article') ? $this->Html->link($articlesKardex->article->name, ['controller' => 'Articles', 'action' => 'view', $articlesKardex->article->id]) : '' ?></td>
                <td><?= $articlesKardex->has('kardex') ? $this->Html->link($articlesKardex->kardex->id, ['controller' => 'Kardexes', 'action' => 'view', $articlesKardex->kardex->id]) : '' ?></td>
                <td><?= h($articlesKardex->resgistry) ?></td>
                <td><?= $this->Number->format($articlesKardex->quantity) ?></td>
                <td><?= $this->Number->format($articlesKardex->amount) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $articlesKardex->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $articlesKardex->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $articlesKardex->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesKardex->id)]) ?>
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
