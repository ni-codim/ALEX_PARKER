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
    $title = TITLE_POSTS_INDEX;
    ob_start();
      include '../app/views/posts/index.php';
    $content = ob_get_clean();
}

/**
 * [showAction description]
 * @param  PDO    $conn               [description]
 * @param  int    $id                 [description]
 */
function showAction(\PDO $conn, int $id){
    // Je mets $posts les champs d'un post que je demande au modèle
    include_once '../app/models/postsModel.php';
    $post = PostModel\findOneById($conn, $id);
    // Je charge la vue posts/show dans $content
    GLOBAL $content;
    $title = $post['title'];
    ob_start();
      include '../app/views/posts/show.php';
    $content = ob_get_clean();
}
