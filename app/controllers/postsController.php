<?php
/*
  ./app/controllers/postsController.php
*/

namespace App\Controllers\PostsController;
use \App\Models\PostsModel;

/**
 * [indexAction description]
 * @param  PDO    $conn   [description]
 */
function indexAction(\PDO $conn){
  // Je mets dans $posts la liste des 10 derniers posts que je demande au modèle
    include_once '../app/models/postsModel.php';
    $posts = PostsModel\findAll($conn);
  // Je charge la vue posts/index dans $content
    GLOBAL $title, $content;
    $title = "Blog";
    ob_start();
      include '../app/views/posts/index.php';
    $content = ob_get_clean();
}