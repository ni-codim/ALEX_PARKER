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
    // Je demande au modèle de trouver le post
    // selon l'id correspondant pour afficher le post
    include_once '../app/models/postsModel.php';
    // Je mets le post trouvé dans $post
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
    // Je charge les catégories dans $categories
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
    // Je redirige vers la liste des posts
    header('location: ' . BASE_URL);
}

function editFormAction(\PDO $conn, int $id){
    // Je demande au modèle de trouver le post
    // selon l'id correspondant pour modifier le post
    include_once '../app/models/postsModel.php';
    // Je mets le post trouvé dans $post
    $post = PostsModel\findOneById($conn, $id);
    // Je charge les catégories dans $categories
    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAll($conn);
    // Je charge la vue editForm dans $content
    GLOBAL $title, $content;
    $title = TITLE_POSTS_EDITFORM;
    ob_start();
    include '../app/views/posts/editForm.php';
    $content = ob_get_clean();
}

function editAction(\PDO $conn, int $id){
    // Je demande au modèle des posts de modifier un post
    include_once '../app/models/postsModel.php';
    $editedPost = PostsModel\updateOneById($conn, $id, $_POST);
    // Je redirige vers le détail du post
    header('location: ' . BASE_URL . 'posts/' . $id . '/' . \Core\Functions\slugify($_POST['title']) . '.html');
}

function deleteAction(\PDO $conn, int $id){
    // Je demande au modèle des posts de supprimer un post
    include_once '../app/models/postsModel.php';
    $deletedPost = PostsModel\deleteOneById($conn, $id, $_POST);
    // Je redirige vers la liste des posts
    header('location: ' . BASE_URL);
}
