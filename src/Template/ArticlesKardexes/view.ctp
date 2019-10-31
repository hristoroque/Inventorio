<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesKardex $articlesKardex
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Articles Kardex'), ['action' => 'edit', $articlesKardex->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Articles Kardex'), ['action' => 'delete', $articlesKardex->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesKardex->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles Kardexes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articles Kardex'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Kardexes'), ['controller' => 'Kardexes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kardex'), ['controller' => 'Kardexes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articlesKardexes view large-9 medium-8 columns content">
    <h3><?= h($articlesKardex->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Article') ?></th>
            <td><?= $articlesKardex->has('article') ? $this->Html->link($articlesKardex->article->name, ['controller' => 'Articles', 'action' => 'view', $articlesKardex->article->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kardex') ?></th>
            <td><?= $articlesKardex->has('kardex') ? $this->Html->link($articlesKardex->kardex->id, ['controller' => 'Kardexes', 'action' => 'view', $articlesKardex->kardex->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($articlesKardex->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($articlesKardex->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($articlesKardex->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resgistry') ?></th>
            <td><?= $articlesKardex->resgistry ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
