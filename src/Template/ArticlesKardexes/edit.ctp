<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesKardex $articlesKardex
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $articlesKardex->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $articlesKardex->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Articles Kardexes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Kardexes'), ['controller' => 'Kardexes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kardex'), ['controller' => 'Kardexes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articlesKardexes form large-9 medium-8 columns content">
    <?= $this->Form->create($articlesKardex) ?>
    <fieldset>
        <legend><?= __('Edit Articles Kardex') ?></legend>
        <?php
            echo $this->Form->control('article_id', ['options' => $articles]);
            echo $this->Form->control('kardex_id', ['options' => $kardexes]);
            echo $this->Form->control('resgistry');
            echo $this->Form->control('quantity');
            echo $this->Form->control('amount');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
