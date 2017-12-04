<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Photos $photos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $photo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $photo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Portafolio'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="blog form large-9 medium-8 columns content">
    <?= $this->Form->create($photo) ?>
    <fieldset>
        <legend><?= __('Editar Foto') ?></legend>
        <?php
            $tags = ['Paisaje', 'Urbano', 'Arquitectura', 'Blanco & Negro', 'Retrato'];

            echo $this->Form->control('name', array('label' => 'Nombre'));
            echo $this->Form->file('location', array('label' => 'Ubicacion'));
            echo $this->Form->input('tags', array('options'=> $tags, 'type' => 'select', 'label' => 'Etiquetas', 'value' => $tags));
            echo $this->Form->input('metadata_id', array('options'=> $settings, 'type' => 'select', 'label' => 'Ajustes', 'value' => $ids));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
