<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Blog'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="blog index large-9 medium-8 columns content">
    <h3><?= __('Blog') ?></h3>
    <table cellpadding="0" cellspacing="0">
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
        <tbody>
            <?php foreach ($blog as $blog): ?>
            <tr>
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
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
