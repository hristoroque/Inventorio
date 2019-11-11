<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\KardexesCab $kardexesCab
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Kardexes Cab'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="kardexesCab form large-9 medium-8 columns content">
    <?= $this->Form->create($kardexesCab) ?>
    <fieldset>
        <legend><?= __('Add Kardexes Cab') ?></legend>
        <?php
            echo $this->Form->control('article_id', ['options' => $articles]);
            echo $this->Form->control('current_stock');
            echo $this->Form->control('current_balance');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
