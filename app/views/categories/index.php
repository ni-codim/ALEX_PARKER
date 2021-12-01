<?php
/*
  ./app/views/categories/index.php
  Variables disponibles:
    - $categories: ARRAY(ARRAY(id, name))
*/
?>


<ul class="menu-link">
    <?php foreach ($categories as $category) : ?>
        <li><a href="index.html"><?php echo $category['name']; ?>
          <?php foreach ($nbrCatPosts as $nbrCatPost) : ?>
                <?php if ($nbrCatPost['category_id'] === $category['id']) : ?>[<?php echo $nbrCatPost['nbrPostsByCategory']; ?>]</a></li>
                <?php endif; ?>
          <?php endforeach; ?>
    <?php endforeach; ?>

    <?php

    if(isset($_GET['page']) && !empty ($_GET['page'])){
      $currentPage = (int) strip_tags($_GET['page']);
    }else{
      $currentPage = 1;
    }
  ?>


  <?php foreach ($totalPosts as $totalPost): ?>
  <p>Nombre total d'articles :  <?php echo $totalPost['nbrTotalPosts']; ?></p>
  <?php endforeach; ?>

  <?php
  // Calcul du nombre de pages total
  $parPage = 10;
  $nbrTotalPosts = $totalPost['nbrTotalPosts'];
  $pages = ceil($nbrTotalPosts/$parPage);
   ?>
   Le numéro de la page courante est <?php echo $currentPage; ?> <br />
   Le nombre de pages nécessaire est de : <?php echo $pages; ?>

   <?php

   // Calcul du 1er article

   $premier = ($currentPage * $parPage) - $parPage;

   ?>
</ul>
