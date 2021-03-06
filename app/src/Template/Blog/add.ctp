<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog $blog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Lista de Eventos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="blog form large-9 medium-8 columns content">
    <?= $this->Form->create($blog) ?>
    <fieldset>
        <legend><?= __('Agregar Evento') ?></legend>
        <?php
            echo $this->Form->control('name', array('label' => 'Titulo'));
            echo $this->Form->control('description', array('label' => 'Descripcion'));
            echo $this->Form->control('eventDate',array('label' => 'Fecha'), ['empty' => false]);
            echo $this->Form->control('place', array('label' => 'Lugar'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar')) ?>
    <?= $this->Form->end() ?>
</div>
