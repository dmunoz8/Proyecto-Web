<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog $blog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Blog'), ['action' => 'edit', $blog->eventId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blog'), ['action' => 'delete', $blog->eventId], ['confirm' => __('Are you sure you want to delete # {0}?', $blog->eventId)]) ?> </li>
        <li><?= $this->Html->link(__('List Blog'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="blog view large-9 medium-8 columns content">
    <h3><?= h($blog->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($blog->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($blog->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Place') ?></th>
            <td><?= h($blog->place) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EventId') ?></th>
            <td><?= $this->Number->format($blog->eventId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EventDate') ?></th>
            <td><?= h($blog->eventDate) ?></td>
        </tr>
    </table>
</div>
