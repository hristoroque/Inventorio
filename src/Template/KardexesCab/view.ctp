<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\KardexesCab $kardexesCab
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>        
        <li><?= $this->Form->postLink(__('Delete Kardex'), ['action' => 'delete', $kardexesCab->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kardexesCab->id)]) ?> </li>
        <li><?= $this->Html->link(__('Kardex'), ['action' => 'index']) ?> </li>        
    </ul>
</nav>
<div class="kardexesCab view large-9 medium-8 columns content">
    <h3><?= h($kardexesCab->id) ?></h3>
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
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Kardex Cab') ?></th>
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
                <td><?= h($kardexesDet->id) ?></td>
                <td><?= h($kardexesDet->kardex_cab_id) ?></td>
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
        <?php endif; ?>
    </div>
</div>
