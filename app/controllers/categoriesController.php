<?php

/*
  ./app/controllers/categoriesController.php
 */

namespace App\Controllers\CategoriesController;
use \App\Models\categoriesModel;

function indexAction(\PDO $conn){
  include_once '../app/models/categoriesModel.php';
  $categories = categoriesModel\findAll($conn);

  include_once '../app/models/postsModel.php';
  $nbrPosts = \App\Models\PostsModel\findNumberOfPostsByCategory($conn);

  include '../app/views/categories/index.php';
}




 ?>
