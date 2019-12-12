<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<?php $this->start('navbar') ?>
        <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
            <a class="navbar-brand" href="/articles"><?=__("Return")?></a> 
        </nav>
<?php $this->end() ?>
<div class="row">
<div>
    <nav class="col-md-2">
        <ul class="nav flex-column">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Users'), ['controller' => 'Users', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>        
            <li><?= $this->Html->link(__('New Providers'), ['controller' => 'Providers', 'action' => 'add']) ?></li>        
            <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Categories'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        </ul>
    </nav>
</div>
<div class="col-md-10">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Add Article') ?></legend>
        <?php
            echo $this->Form->control('provider_id', ['options' => $providers]);
            echo $this->Form->control('category_id', ['options' => $categories]);
            echo $this->Form->control('buy_price');
            echo $this->Form->control('sell_price');
            echo $this->Form->control('name');
            echo $this->Form->control('description');            
            echo $this->Form->control('current_stock');
            echo $this->Form->control('current_balance');
            echo $this->Form->control('state');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>