<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php $this->start('navbar') ?>
        <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
            <a class="navbar-brand" href="./"><?=__("Return")?></a> 
        </nav>
<?php $this->end() ?>
<div class="row">
    <nav class="col-md-2">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link disabled">
                    <?= __('Actions') ?>
                </a>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(__('List Users'), ['action' => 'index'],['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index'],['class' => 'nav-link']) ?>
            </li>        
            <li class="nav-item">
                <?= $this->Html->link(__('New Categories'), ['controller' => 'Categories', 'action' => 'add'],['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index'],['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(__('New Providers'), ['controller' => 'Providers', 'action' => 'add'],['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index'],['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(__('New Articles'), ['controller' => 'Articles', 'action' => 'add'],['class' => 'nav-link']) ?>
            </li>
        </ul>
    </nav>
    <div class="col-md-10">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <legend><?= __('Add User') ?></legend>
            <div class="form-group">
                <label for="name"><?= __('Name') ?> </label>
                <?= $this->Form->text('name',['class'=>'form-control']) ?>
            </div>
            <div class="form-group">
                <label for="DNI">DNI</label>
                <?= $this->Form->text('DNI',['class'=>'form-control','type'=>'number']) ?>
            </div>
            <div class="form-group">
                <label for="login"> <?= __('Login') ?> </label>
                <?= $this->Form->text('login',['class'=>'form-control','type'=>'email']) ?>
            </div>
            <div class="form-group">
                <label for="password"> <?= __('Password') ?> </label>
                <?= $this->Form->text('password',['class'=>'form-control']) ?>
            </div>
            <div class="form-group form-check">
                <?= $this->Form->text('state',['class'=>'form-check-input','type'=>'checkbox','id'=>'state']) ?>
                <label for="state"> <?= __('State') ?> </label>
            </div>
        </fieldset>
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>