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
        //   PATTERN: index?posts=show&id=x
        //   CTRL: postsController
        //   ACTION: show
        //   TITLE: Alex Parker - Title du post
        PostsController\showAction($conn, $_GET['id']);
        break;
     case 'addForm':
        // ROUTE D'AJOUT D'UN POST: affichage du formulaire
        //   PATTERN: index?posts=addForm
        //   CTRL: postsController
        //   ACTION: addForm
        //   TITLE: Alex Parker - Add a post
        PostsController\addFormAction($conn);
        break;
     case 'add':
        // ROUTE D'AJOUT D'UN POST: INSERT
        //   PATTERN: index.php?posts=add
        //   CTRL: postsController
        //   ACTION: add
        //   PAS DE TITLE CAR REDIRECTION VERS LA PAGE D'ACCUEIL
        PostsController\addAction($conn);
        break;
    case 'editForm':
        // ROUTE DE MODIFICATION D'UN POST: affichage du formulaire
        //   PATTERN: index.php?posts=editForm
        //   CTRL: postsController
        //   ACTION: editForm
        //   TITLE: Alex Parker - Edit a post
        PostsController\editFormAction($conn, $_GET['id']);
        break;
    case 'edit':
        // ROUTE DE MODIFICATION D'UN POST: UPDATE
        //   PATTERN: index.php?posts=edit&id=x
        //   CTRL: postsController
        //   ACTION: edit
        //   PAS DE TITLE CAR REDIRECTION VERS LA PAGE DE DETAILS DU POST
        PostsController\editAction($conn, $_GET['id']);
        break;
    case 'delete':
        // ROUTE DE SUPPRESSION D'UN POST:
        //     PATTERN: index.php?posts=delete&id=x
        //     CTRL: postsController
        //     ACTION: delete
        //     PAS DE TITLE CAR REDIRECTION VERS LA PAGE D'ACCUEIL
        PostsController\deleteAction($conn, $_GET['id']);
        break;
endswitch;
 ?>
