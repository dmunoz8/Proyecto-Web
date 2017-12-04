<br>
<div class="columns large-6" style="left: 2%">

  <h1 style="font-family: 'Raleway', sans-serif; font-weight: bold;">Contacto</h1>

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
