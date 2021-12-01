<?php

/*
  ./app/controllers/categoriesController.php
 */

namespace App\Controllers\CategoriesController;
use \App\Models\categoriesModel;

function indexAction(\PDO $conn){
  // Je récupère les catégories que je demande au modèle des catégories
  // Je les mets dans $categories
  include_once '../app/models/categoriesModel.php';
  $categories = categoriesModel\findAll($conn);

  // On va chercher le nombre de posts par catégories
  // On met ce nombre dans $nbrCatPosts
  include_once '../app/models/postsModel.php';
  $nbrCatPosts = \App\Models\PostsModel\findNumberOfPostsByCategory($conn);
  $totalPosts = \App\Models\PostsModel\findNumberOfPosts($conn);

  include '../app/views/categories/index.php';
}




 ?>
