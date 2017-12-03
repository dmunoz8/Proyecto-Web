<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('login.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-2 medium-3 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            
            <ul class="right">
              <li><?php echo $this->Html->link('Inicio', array('controller' => 'Pages','action' => 'display')); ?></li>
              <li><?php echo $this->Html->link('Portafolio', array('controller' => 'Photos','action' => 'index')); ?></li>
              <li><?php echo $this->Html->link('Eventos', array('controller' => 'Blog','action' => 'index')); ?></li>
              <li><?php echo $this->Html->link('Acerca', array('controller' => 'Pages','action' => 'acerca')); ?></li>
              <li><?php echo $this->Html->link('Contacto', array('controller' => 'Pages','action' => 'contacto')); ?></li>

              <?php if (isset($current_user)): ?>
                <li><?php echo $this->Html->link('Salir', array('controller' => 'Users','action' => 'logout')); ?></li>
              <?php endif; ?>
            </ul>
            
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
