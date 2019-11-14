<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OperationsCab $operationsCab 
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Operations Cab'), ['action' => 'edit', $operationsCab->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Operations Cab'), ['action' => 'delete', $operationsCab->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationsCab->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Operations Cab'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operations Cab'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operations Types'), ['controller' => 'OperationsTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operations Type'), ['controller' => 'OperationsTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="operationsCab view large-9 medium-8 columns content">
    <h3><?= h($operationsCab->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $operationsCab->has('user') ? $this->Html->link($operationsCab->user->name, ['controller' => 'Users', 'action' => 'view', $operationsCab->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Operations Type') ?></th>
            <td><?= $operationsCab->has('operations_type') ? $this->Html->link($operationsCab->operations_type->name, ['controller' => 'OperationsTypes', 'action' => 'view', $operationsCab->operations_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($operationsCab->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($operationsCab->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($operationsCab->modified) ?></td>
        </tr>
    </table>
    <div class="related">
    <?php use Cake\Datasource\ConnectionManager;?>
        <h4><?= __('Related Operaciones') ?></h4>
        <?php if (!empty($operationsCab->operations_det)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Operation Cab') ?></th>
                <th scope="col"><?= __('Article') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
            </tr>
            
            <?php foreach ($operationsCab->operations_det as $operations_det): ?>
            
            <tr>
                <td><?= h($operations_det->id) ?></td>
                <td><?= h($operations_det->operation_cab_id) ?></td>
                <td><?php
                   $connection = ConnectionManager::get('default'); 
                   $article_info = $connection->execute('select name from articles where id = '.$operations_det->article_id.'')->fetchAll('assoc');
                   //print_r ($article_info[0]['name']);
                   ?>
                   <?= $this->Html->link($article_info[0]['name'], ['controller' => 'Articles', 'action' => 'view', $operations_det->article_id]) ?></td>
                <td><?= h($operations_det->quantity) ?></td>                
                  
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>

    <div class="operationsCab view large-9 medium-8 columns content">
    <h2>TOTAL = <?php                    
                    $connection = ConnectionManager::get('default');
                    $article_info = $connection->execute('select * from articles where id = '.$operations_det->article_id.'')->fetchAll('assoc');
                    if($operationsCab->operations_type->id == 1)
                        $precio = $article_info[0]['buy_price'];
                    else
                        $precio = $article_info[0]['sell_price'];
                    echo $operations_det->quantity * $precio.' Soles'; 
                 ?>
</div>
