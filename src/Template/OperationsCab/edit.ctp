<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OperationsCab $operationsCab
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $operationsCab->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $operationsCab->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['action' => 'index']) ?></li>
        
        
    </ul>
</nav>
<div class="operationsCab form large-9 medium-8 columns content">
    <?= $this->Form->create($operationsCab) ?>
    <fieldset>
        <legend><?= __('Edit Operations Cab') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('operation_type_id', ['options' => $operationsTypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
