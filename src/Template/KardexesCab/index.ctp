<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\KardexesCab[]|\Cake\Collection\CollectionInterface $kardexesCab
 */
?>
<?php $this->start('navbar') ?>
<ul class="navbar navbar-dark bg-dark navbar-expand-smg">
    <a class="navbar-brand" href="..">Volver</a>
</ul>
<?php $this->end() ?>
<div class="row">
<div class="col-sm-12">
    <h3><?= __('Kardex') ?></h3>
    <div class="table-responsive-sm">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('article_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('current_stock')) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('current_balance')) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('created')) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('modified')) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kardexesCab as $kardexesCab): ?>
            <tr>
                <td><?= $this->Number->format($kardexesCab->id) ?></td>
                <td><?= $kardexesCab->has('article') ? $this->Html->link($kardexesCab->article->name, ['controller' => 'Articles', 'action' => 'view', $kardexesCab->article->id]) : '' ?></td>
                <td><?= $this->Number->format($kardexesCab->current_stock) ?></td>
                <td><?= $this->Number->format($kardexesCab->current_balance) ?></td>
                <td><?= h($kardexesCab->created) ?></td>
                <td><?= h($kardexesCab->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $kardexesCab->id]) ?>                                        
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <div class="row">
        <ul class="btn-group" role="group" aria-label="Basic example">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous'),['class'=>'disabled']) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
    <div class="row">
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
</div>