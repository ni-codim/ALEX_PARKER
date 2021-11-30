<?php
/*
  ./app/routers/posts.php
  ROUTEUR DES POSTS

 */

use \App\Controllers\PostsController;

include_once '../app/controllers/postsController.php';

switch ($_GET['posts']):
     case 'show':
        // ROUTE DU DETAIL D'UN POST
        //   PATTERN: /posts/id/slug-du-post.html
        //   CTRL: postsController
        //   ACTION: show
        //   TITLE: Alex Parker - Title du post
        PostsController\showAction($conn, $_GET['id']);
        break;
     case 'addForm':
        // ROUTE D'AJOUT D'UN POST: affichage du formulaire
        //   PATTERN: /posts/add/form.html
        //   CTRL: postsController
        //   ACTION: addForm
        //   TITLE: Alex Parker - Add a post
        PostsController\addFormAction($conn);
        break;
     case 'add':
        // ROUTE D'AJOUT D'UN POST: INSERT
        //   PATTERN: /posts/add/insert.html
        //   CTRL: postsController
        //   ACTION: add
        //   PAS DE TITLE CAR REDIRECTION VERS LA PAGE D'ACCUEIL
        PostsController\addAction($conn);
        break;
    case 'editForm':
        // ROUTE DE MODIFICATION D'UN POST: affichage du formulaire
        //   PATTERN: /posts/id/slug-du-post/edit/form.html
        //   CTRL: postsController
        //   ACTION: editForm
        //   TITLE: Alex Parker - Edit a post
        PostsController\editFormAction($conn, $_GET['id']);
        break;
    case 'edit':
        // ROUTE DE MODIFICATION D'UN POST: UPDATE
        //   PATTERN: /posts/id/slug-du-post/edit/update.html
        //   CTRL: postsController
        //   ACTION: edit
        //   PAS DE TITLE CAR REDIRECTION VERS LA PAGE DE DETAILS DU POST
        PostsController\editAction($conn, $_GET['id']);
        break;
    case 'delete':
        // ROUTE DE SUPPRESSION D'UN POST:
        //     PATTERN: /posts/id/slug-du-post/delete.html
        //     CTRL: postsController
        //     ACTION: delete
        //     PAS DE TITLE CAR REDIRECTION VERS LA PAGE D'ACCUEIL
        PostsController\deleteAction($conn, $_GET['id']);
        break;
endswitch;
 ?>
