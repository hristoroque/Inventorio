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
<nav class="col-md-2">
    <ul class="nav flex-column">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Users'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>        
        <li><?= $this->Html->link(__('New Providers'), ['controller' => 'Providers', 'action' => 'add']) ?></li>        
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categories'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="col-md-10">
    <h3><?= h($article->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Provider') ?></th>
            <td><?= $article->has('provider') ? $this->Html->link($article->provider->name, ['controller' => 'Providers', 'action' => 'view', $article->provider->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $article->has('category') ? $this->Html->link($article->category->name, ['controller' => 'Categories', 'action' => 'view', $article->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($article->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($article->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Buy Price') ?></th>
            <td><?= $this->Number->format($article->buy_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sell Price') ?></th>
            <td><?= $this->Number->format($article->sell_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($article->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $article->state ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="col-md-12">
        <h4><?= __('Related Kardexes Cab') ?></h4>
        <?php if (!empty($article->kardexes_cab)): ?>
        <div class="table-responsive">
        <table class="table">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Article Id') ?></th>
                <th scope="col"><?= __('Current Stock') ?></th>
                <th scope="col"><?= __('Current Balance') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($article->kardexes_cab as $kardexesCab): ?>
            <tr>
                <td><?= h($kardexesCab->id) ?></td>
                <td><?= h($kardexesCab->article_id) ?></td>
                <td><?= h($kardexesCab->current_stock) ?></td>
                <td><?= h($kardexesCab->current_balance) ?></td>
                <td><?= h($kardexesCab->created) ?></td>
                <td><?= h($kardexesCab->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'KardexesCab', 'action' => 'view', $kardexesCab->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'KardexesCab', 'action' => 'edit', $kardexesCab->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'KardexesCab', 'action' => 'delete', $kardexesCab->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kardexesCab->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-md-12">
        <h4><?= __('Related Operations Det') ?></h4>
        <?php if (!empty($article->operations_det)): ?>
        <div class="table-responsive">
        <table class="table">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Operation Cab Id') ?></th>
                <th scope="col"><?= __('Article Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($article->operations_det as $operationsDet): ?>
            <tr>
                <td><?= h($operationsDet->id) ?></td>
                <td><?= h($operationsDet->operation_cab_id) ?></td>
                <td><?= h($operationsDet->article_id) ?></td>
                <td><?= h($operationsDet->quantity) ?></td>
                <td><?= h($operationsDet->created) ?></td>
                <td><?= h($operationsDet->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OperationsDet', 'action' => 'view', $operationsDet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OperationsDet', 'action' => 'edit', $operationsDet->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OperationsDet', 'action' => 'delete', $operationsDet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationsDet->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <?php endif; ?>
    </div>
</div>
</div>