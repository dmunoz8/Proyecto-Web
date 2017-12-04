<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<div class="columns large-12">
<h1>Portfolio</h1>

<?= $this->Html->link('Add Photo', ['action' => 'add']) ?>
<br>
<br>
<input type="radio" onclick="filterSelection('all')" name="category" checked> Show all
<input type="radio" onclick="filterSelection('Landscape')" name="category"> Landscape
<input type="radio" onclick="filterSelection('Urban')" name="category"> Urban
<input type="radio" onclick="filterSelection('Architecture')" name="category"> Architecture
<input type="radio" onclick="filterSelection('Black&White')" name="category"> Black & White

<div class="rowPortfolio">

    <!-- Here is where we iterate through our $photos query object, printing out photo info -->
      <?php
        foreach ($query as $photo)
        {
          echo "<div class='columnPortfolio {$photo->tags}'>
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
          <button class='fa fa-thumbs-o-up' onclick='addLike({$photo->id})'></button>
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
  x = document.getElementsByClassName("columnPortfolio");
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
