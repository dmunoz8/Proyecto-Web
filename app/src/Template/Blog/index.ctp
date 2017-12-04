<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
      <h1 style="font-family: 'Raleway', sans-serif; font-weight: bold;">Eventos</h1>
      <?php
        if($authUser)
        { echo "
        <li class='heading'><?= __('Acciones') ?></li>
        <li>" ?>
          <?= $this->Html->link(__('Agregar Evento'), ['action' => 'add']) ?>
        <?php echo "</li>";
        };?>

    </ul>
</nav>
<div class="blog index large-9 medium-8 columns content">

          <?php foreach ($blog as $blog)
          {
            echo "<div class='row'>
              <div class='containerEventos'>

              <h4><span class='fa fa-calendar'></span>{$blog->name}
              <div style='float: right'>" ?>
                <?php
                if($authUser)
                {
                  echo $this->Html->link(
                    $this->Html->tag('span', '', array('class' => 'fa fa-pencil')),
                    array('controller' => 'blog', 'action' => 'edit', $blog->eventId),
                    array('escape' => false)
                  );
                  echo $this->Html->link(
                    $this->Html->tag('span', '', array('class' => 'fa fa-trash')),
                    array('controller' => 'blog', 'action' => 'delete', $blog->eventId),
                    array('escape' => false)
                  );
                }
                ?>
              <?php echo "</div></h4>"; ?>
              <?php  echo "<p>Fecha: {$blog->eventDate}</p>
              <p>Lugar: {$blog->place}</p>
              <p>{$blog->description}</p>
              </div>
              </div>"; }
              ?>

  <!--  <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('eventId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('eventDate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('place') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody> -->

          <!--  <tr>
                <td><?= $this->Number->format($blog->eventId) ?></td>
                <td><?= h($blog->name) ?></td>
                <td><?= h($blog->description) ?></td>
                <td><?= h($blog->eventDate) ?></td>
                <td><?= h($blog->place) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $blog->eventId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blog->eventId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blog->eventId], ['confirm' => __('Seguro que desea borror el evento # {0}?', $blog->eventId)]) ?>
                </td>
            </tr> -->

      <!--  </tbody>
    </table> -->
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
