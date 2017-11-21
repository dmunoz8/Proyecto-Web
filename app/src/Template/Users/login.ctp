<div class="columns large-12" style="height:30em; position:relative ">

<div style="position:absolute; margin:0; top:50%;left:50%; margin-right:-50%;transform: translate(-50%,-50%)">
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>
</div>
</div>
