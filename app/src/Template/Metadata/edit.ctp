<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Metadata $metadata
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $metadata->preferences],
                ['confirm' => __('Seguro que desea borrar el metadato # {0}?', $metadata->preferences)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Lista de Metadatos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="metadata form large-9 medium-8 columns content">
    <?= $this->Form->create($metadata) ?>
    <fieldset>
        <legend><?= __('Editar Metadato') ?></legend>
        <?php
            echo $this->Form->control('camera', array('label' => 'Camara'));
            echo $this->Form->control('lens',array('label' => 'Lente'));
            echo $this->Form->control('shutterSpeed', array('label' => 'Velocidad'));
            echo $this->Form->control('aperture', array('label' => 'Apertura'));
            echo $this->Form->control('ISO');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
