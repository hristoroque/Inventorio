<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\KardexesCab $kardexesCab
 */
?>
<?php $this->start('navbar') ?>
        <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
            <a class="navbar-brand" href="/kardexes-cab/"><?=__("Return")?></a> 
        </nav>
<?php $this->end() ?>
<div class="col-sm-12">
    <h3>KARDEX <?= ($kardexesCab->article->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Article') ?></th>
            <td><?= $kardexesCab->has('article') ? $this->Html->link($kardexesCab->article->name, ['controller' => 'Articles', 'action' => 'view', $kardexesCab->article->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($kardexesCab->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Stock') ?></th>
            <td><?= $this->Number->format($kardexesCab->current_stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Balance') ?></th>
            <td><?= $this->Number->format($kardexesCab->current_balance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($kardexesCab->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($kardexesCab->modified) ?></td>
        </tr>
    </table>
    
    <div class="related">
        <h4><?= __('Related Details') ?></h4>
        <?php if (!empty($kardexesCab->kardexes_det)): ?>
        <div class="table-responsive">
        <table class="table">
            <tr>            
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Entry Amount') ?></th>
                <th scope="col"><?= __('Entry Unit Price') ?></th>
                <th scope="col"><?= __('Entry Total Price') ?></th>
                <th scope="col"><?= __('Output Amount') ?></th>
                <th scope="col"><?= __('Output Unit Price') ?></th>
                <th scope="col"><?= __('Output Total Price') ?></th>
                <th scope="col"><?= __('Existence Current Stock') ?></th>
                <th scope="col"><?= __('Existence Current Balance') ?></th>                                
            </tr>
            <?php foreach ($kardexesCab->kardexes_det as $kardexesDet): ?>
            <tr>                
                <td><?= h($kardexesDet->date) ?></td>
                <td><?= h($kardexesDet->entry_amount) ?></td>
                <td><?= h($kardexesDet->entry_unit_price) ?></td>
                <td><?= h($kardexesDet->entry_total_price) ?></td>
                <td><?= h($kardexesDet->output_amount) ?></td>
                <td><?= h($kardexesDet->output_unit_price) ?></td>
                <td><?= h($kardexesDet->output_total_price) ?></td>
                <td><?= h($kardexesDet->existence_current_stock) ?></td>        
                <td><?= h($kardexesDet->existence_current_balance) ?></td>         
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <?php endif; ?>
    </div>
</div>
