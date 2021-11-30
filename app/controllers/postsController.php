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
  // Je mets dans $posts la liste des 10 derniers posts que je demande au modèle des posts
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
    // Je demande au modèle des posts les champs d'un post selon son id
    // Je mets ça dans $post
    include_once '../app/models/postsModel.php';
    $post = PostsModel\findOneById($conn, $id);
    // Je charge la vue posts/show dans $content
    GLOBAL $title, $content;
    $title = $post['title'];
    ob_start();
      include '../app/views/posts/show.php';
    $content = ob_get_clean();
}

/**
 * [addFormAction description]
 * @param PDO $conn  [description]
 */
function addFormAction(\PDO $conn){
    //  Je demande les catégories au modèle des catégories
    //  Je les mets dans $categories
    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAll($conn);
    // Je charge la vue addForm dans $content
    GLOBAL $title, $content;
    $title = TITLE_POSTS_ADDFORM;
    ob_start();
    include '../app/views/posts/addForm.php';
    $content = ob_get_clean();
}

/**
 * [addAction description]
 * @param PDO $conn  [description]
 */
function addAction(\PDO $conn){
    // Je demande au modèle des posts d'ajouter un post
    include_once '../app/models/postsModel.php';
    $id = \App\Models\PostsModel\insert($conn, $_POST);
    // Je redirige vers l'index
    header('location: ' . BASE_URL);
}
