<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OperationsCab $operationsCab
 */
?>
<?php $this->start('navbar') ?>
        <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
            <a class="navbar-brand" href="/operations-cab"><?=__("Return")?></a> 
        </nav>
<?php $this->end() ?>
<div class="row"> 
<nav class="col-md-2">
    <ul class="nav flex-column">
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
<div class="col-md-10">
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
</div>