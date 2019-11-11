<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\KardexesDet $kardexesDet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $kardexesDet->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $kardexesDet->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Kardexes Det'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Kardexes Cab'), ['controller' => 'KardexesCab', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kardexes Cab'), ['controller' => 'KardexesCab', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="kardexesDet form large-9 medium-8 columns content">
    <?= $this->Form->create($kardexesDet) ?>
    <fieldset>
        <legend><?= __('Edit Kardexes Det') ?></legend>
        <?php
            echo $this->Form->control('kardex_cab_id', ['options' => $kardexesCab]);
            echo $this->Form->control('date', ['empty' => true]);
            echo $this->Form->control('entry_amount');
            echo $this->Form->control('entry_unit_price');
            echo $this->Form->control('entry_total_price');
            echo $this->Form->control('output_amount');
            echo $this->Form->control('output_unit_price');
            echo $this->Form->control('output_total_price');
            echo $this->Form->control('existence_current_stock');
            echo $this->Form->control('existence_current_balance');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
