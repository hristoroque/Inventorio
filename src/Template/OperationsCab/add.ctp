<?php  
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OperationsCab $operationsCab
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['action' => 'index']) ?></li>        
    </ul>
</nav>
<div class="operationsCab form large-9 medium-8 columns content">
    <?= $this->Form->create($operationsCab) ?>
    <fieldset>
        <legend><?= __('Add Operations Cab') ?></legend>
        <?php
            $type_op = $_GET['operation_type'];            
            echo $this->Form->control('user_id', ['options' => $users]);
            //echo $this->Form->control('operation_type_id', ['options' => $operationsTypes]);
            echo $this->Form->control('operation_type', array('default'=>$type_op,'readonly' => 'readonly'));
            echo $this->Form->control('article_id', ['options' => $articles]);
            echo $this->Form->control('quantity');
        ?>
        
    </fieldset>
    
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

