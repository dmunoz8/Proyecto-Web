
<div class="columns large-8">
<h1>Add Photo</h1>
<?php
    echo $this->Form->create($photo);
    echo $this->Form->control('name');
    echo $this->Form->file('location');
    echo $this->Form->control('tags');
    echo $this->Form->button(__('Upload Photo'));
    echo $this->Form->end();
?>
</div>
