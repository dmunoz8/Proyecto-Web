
<nav class="large-3 medium-4 columns" id="actions-sidebar">
      <ul class="side-nav">
<h1 style="font-family: 'Raleway', sans-serif; font-weight: bold;">Portafolio</h1>
<br>
<?php
  if($authUser)
  {
    echo $this->Html->link('Agregar Foto', ['action' => 'add']);
  }
  ?>
  <br>
  <br>
  <p style="font-family: 'Raleway', sans-serif;"><strong>Filtrar:</strong></p>
  <input type="radio" onclick="filterSelection('all')" name="category" checked> Todas
  <br>
  <input type="radio" onclick="filterSelection('Paisaje')" name="category"> Paisaje
  <br>
  <input type="radio" onclick="filterSelection('Urbano')" name="category"> Urbano
  <br>
  <input type="radio" onclick="filterSelection('Arquitectura')" name="category"> Arquitectura
  <br>
  <input type="radio" onclick="filterSelection('Blanco&Negro')" name="category"> Blanco & Negro
  <br>
  <input type="radio" onclick="filterSelection('Retrato')" name="category"> Retrato
</ul>
</nav>

<div class="users index large-9 medium-8 columns content">

<div class="masonry">

    <!-- Here is where we iterate through our $photos query object, printing out photo info -->
      <?php
        foreach ($query as $photo)
        {
          echo "<div class='item {$photo->tags}'>
          <div class='containerPortfolio'>
          <img class='portfolio' src='img/assets/{$photo->location}'>
          <div class='overlayPortfolio'>
          <div class='textPortfolio'>{$photo->metadata->camera}
          <br>
          {$photo->metadata->lens}
          <br>
          {$photo->metadata->shutterSpeed}
          <br>
          {$photo->metadata->aperture}
          <br>
          {$photo->metadata->ISO}
          </div>
          <button class='fa fa-thumbs-o-up' onclick='addLike({$photo->id})'></button>"
          ?>
          <?php
            if($authUser)
            {
              echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-pencil')),
                array('controller' => 'photos', 'action' => 'edit', $photo->id),
                array('escape' => false)
              );
              echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-trash')),
                array('controller' => 'photos', 'action' => 'delete', $photo->id),
                array('escape' => false)
              );
            }
          ?>
          <?php echo "
          </div>
          </div>
          </div>";
        }
      ?>

</div>
</div>

<script>
filterSelection("all") // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("item");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    RemoveClass(x[i], "showPortfolio");
    if (x[i].className.indexOf(c) > -1) AddClass(x[i], "showPortfolio");
  }
}

// Show filtered elements
function AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

function addLike(id)
{
  $.ajax({
    url: '<?php echo $this->Url->build([
      "controller" => "Photos",
      "action" => "addLike"]) ?>',
    type: 'POST',
    data: {id: id}
  });
}

</script>
