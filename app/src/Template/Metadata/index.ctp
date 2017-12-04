<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Metadata[]|\Cake\Collection\CollectionInterface $metadata
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Nuevo Metadato'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="metadata index large-9 medium-8 columns content">
    <h3><?= __('Metadatos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('camara') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lente') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Velocidad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Apertura') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ISO') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($metadata as $metadata): ?>
            <tr>
                <td><?= h($metadata->camera) ?></td>
                <td><?= h($metadata->lens) ?></td>
                <td><?= h($metadata->shutterSpeed) ?></td>
                <td><?= h($metadata->aperture) ?></td>
                <td><?= h($metadata->ISO) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $metadata->preferences]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $metadata->preferences]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $metadata->preferences], ['confirm' => __('Seguro que desea borrar el metadato # {0}?', $metadata->preferences)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primero')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} record(s) de {{count}} en total')]) ?></p>
    </div>
</div>
