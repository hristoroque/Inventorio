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
        <li><?= $this->Html->link(__('Edit Operations'), ['action' => 'edit', $operationsCab->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Operations'), ['action' => 'delete', $operationsCab->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationsCab->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Operations'), ['action' => 'index']) ?> </li>        
    </ul>
</nav>
<div class="col-md-10">
    <h3><?= h($operationsCab->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $operationsCab->has('user') ? $this->Html->link($operationsCab->user->name, ['controller' => 'Users', 'action' => 'view', $operationsCab->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Operations Type') ?></th>
            <td><?= h($operationsCab->operations_type->name) ?></td>
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
        <h4><?= __('Related Operations') ?></h4>
        <?php if (!empty($operationsCab->operations_det)): ?>
        <div class="responsive-table">
        <table class="table">
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
        </div>
        <?php endif; ?>
    </div>

    <div class="operationsCab view large-9 medium-8 columns content">
    <h2><?php $tipo_operacion_mensaje;                   
            $connection = ConnectionManager::get('default');
            $article_info = $connection->execute('select * from articles where id = '.$operations_det->article_id.'')->fetchAll('assoc');
            if($operationsCab->operations_type->id == 1){
                $precio = $article_info[0]['buy_price'];
                $tipo_operacion_mensaje = "COMPRA";
            }
            else{
                $precio = $article_info[0]['sell_price'];
                $tipo_operacion_mensaje = "VENTA";
            }
            echo $tipo_operacion_mensaje." TOTAL = ".$operations_det->quantity * $precio.' Soles'; 
        ?>
</div>
</div>