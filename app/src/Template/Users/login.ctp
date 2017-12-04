<div class="columns large-12" style="height:30em; position:relative ">

<div style="position:absolute; margin:0; top:50%;left:50%; margin-right:-50%;transform: translate(-50%,-50%)">
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<h1>Iniciar Sesion</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email', array('label' => 'Correo')) ?>
<?= $this->Form->control('password', array('label' => 'Contraseña')) ?>
<?= $this->Form->button('Entrar') ?>
<?= $this->Form->end() ?>
</div>
</div>
