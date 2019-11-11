<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $article->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Kardexes Cab'), ['controller' => 'KardexesCab', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kardexes Cab'), ['controller' => 'KardexesCab', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operations Det'), ['controller' => 'OperationsDet', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operations Det'), ['controller' => 'OperationsDet', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Edit Article') ?></legend>
        <?php
            echo $this->Form->control('provider_id', ['options' => $providers]);
            echo $this->Form->control('category_id', ['options' => $categories]);
            echo $this->Form->control('buy_price');
            echo $this->Form->control('sell_price');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('state');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
