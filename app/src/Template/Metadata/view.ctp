<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Metadata $metadata
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Metadata'), ['action' => 'edit', $metadata->preferences]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Metadata'), ['action' => 'delete', $metadata->preferences], ['confirm' => __('Are you sure you want to delete # {0}?', $metadata->preferences)]) ?> </li>
        <li><?= $this->Html->link(__('List Metadata'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Metadata'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="metadata view large-9 medium-8 columns content">
    <h3><?= h($metadata->preferences) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Camera') ?></th>
            <td><?= h($metadata->camera) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lens') ?></th>
            <td><?= h($metadata->lens) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ShutterSpeed') ?></th>
            <td><?= h($metadata->shutterSpeed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aperture') ?></th>
            <td><?= h($metadata->aperture) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ISO') ?></th>
            <td><?= h($metadata->ISO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Preferences') ?></th>
            <td><?= $this->Number->format($metadata->preferences) ?></td>
        </tr>
    </table>
</div>
