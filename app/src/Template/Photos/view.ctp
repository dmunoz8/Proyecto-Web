<h1><?= h($photo->name) ?></h1>
<p><?= h($photo->tags) ?></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $photo->name]) ?></p>
