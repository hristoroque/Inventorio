<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OperationsDet $operationsDet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $operationsDet->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $operationsDet->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Operations Det'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Operations Cab'), ['controller' => 'OperationsCab', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operations Cab'), ['controller' => 'OperationsCab', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="operationsDet form large-9 medium-8 columns content">
    <?= $this->Form->create($operationsDet) ?>
    <fieldset>
        <legend><?= __('Edit Operations Det') ?></legend>
        <?php
            echo $this->Form->control('operation_cab_id', ['options' => $operationsCab]);
            echo $this->Form->control('article_id', ['options' => $articles]);
            echo $this->Form->control('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
