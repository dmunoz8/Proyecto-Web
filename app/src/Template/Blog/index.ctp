<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blog
 */
?>
<?php if (isset($current_user)): ?>
  <nav class="large-3 medium-4 columns" id="actions-sidebar">
      <ul class="side-nav">
          <li class="heading"><?= __('Acciones') ?></li>
          <li><?= $this->Html->link(__('Nuevo Evento'), ['action' => 'add']) ?></li>
      </ul>
  </nav>
<?php endif; ?>
<div class="blog index large-9 medium-8 columns content">
    <h3><?= __('Eventos') ?></h3>

          <?php foreach ($blog as $blog)
          {
            echo "<div class='row'>
              <div class='containerEventos'>
              <span class='fa fa-calendar'></span>
              <h4>{$blog->name}
              <div style='float: right'>" ?>
                <?php
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
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blog->eventId], ['confirm' => __('Are you sure you want to delete # {0}?', $blog->eventId)]) ?>
                </td>
            </tr> -->

      <!--  </tbody>
    </table> -->
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
