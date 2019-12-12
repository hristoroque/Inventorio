<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<?php $this->start('navbar') ?>
        <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
            <a class="navbar-brand" href="/categories"><?=__("Return")?></a> 
        </nav>
<?php $this->end() ?>
<div class="row">
<nav class="col-md-2">
    <ul class="nav flex-column">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Users'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>        
        <li><?= $this->Html->link(__('New Providers'), ['controller' => 'Providers', 'action' => 'add']) ?></li>        
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Articles'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="col-md-10">
    <h3><?= h($category->name) ?></h3>
    <div class="table-responsive">
    <table class="table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($category->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($category->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($category->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $category->state ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    </div>
    <div class="col-md-12">
        <h4><?= __('Related Articles') ?></h4>
        <?php if (!empty($category->articles)): ?>
        <div class="table-responsive">
        <table class="table">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Provider Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Buy Price') ?></th>
                <th scope="col"><?= __('Sell Price') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->articles as $articles): ?>
            <tr>
                <td><?= h($articles->id) ?></td>
                <td><?= h($articles->provider_id) ?></td>
                <td><?= h($articles->category_id) ?></td>
                <td><?= h($articles->buy_price) ?></td>
                <td><?= h($articles->sell_price) ?></td>
                <td><?= h($articles->name) ?></td>
                <td><?= h($articles->description) ?></td>
                <td><?= h($articles->state) ?></td>
                <td><?= h($articles->created) ?></td>
                <td><?= h($articles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Articles', 'action' => 'view', $articles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Articles', 'action' => 'edit', $articles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Articles', 'action' => 'delete', $articles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <?php endif; ?>
    </div>
</div>
</div>