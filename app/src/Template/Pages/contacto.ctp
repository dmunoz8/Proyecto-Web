<br>
<div class="columns large-10">

  <h1>Contacto</h1>

  <?php
      //echo $this->Form->create($contacto);
      echo $this->Form->control('Nombre');
      echo $this->Form->control('Correo');
      echo $this->Form->control('Asunto');
      echo $this->Form->textarea('Mensaje', ['rows' => '8', 'cols' => '8']);
      echo $this->Form->button(__('Enviar'));
      echo $this->Form->end();
  ?>

</div>
