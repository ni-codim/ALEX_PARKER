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
     case 'addForm';
        // ROUTE D'AJOUT D'UN POST: affichage du formulaire
        //   PATTERN: /posts/add/form.html
        //   CTRL: postsController
        //   ACTION: addForm
        //   TITLE: Alex Parker - Add a post
        PostsController\addFormAction($conn);
endswitch;

// ROUTE D'AJOUT D'UN POST: affichage du formulaire
//     PATTERN: /posts/add/form.html
//     CTRL: ???
//     ACTION: ???
//     TITLE: Alex Parker - Add a post
//
// ROUTE D'AJOUT D'UN POST: INSERT
//     PATTERN: /posts/add/insert.html
//     CTRL: ???
//     ACTION: ???
//     PAS DE TITLE CAR REDIRECTION VERS LA PAGE D'ACCUEIL
//
// ROUTE DE MODIFICATION D'UN POST: Affichage du formulaire
//     PATTERN: /posts/id/slug-du-post/edit/form.html
//     CTRL: ???
//     ACTION: ???
//     TITLE: Alex Parker - Edit a post
//
// ROUTE DE MODIFICATION D'UN POST: UPDATE
//     PATTERN: /posts/id/slug-du-post/edit/update.html
//     CTRL: ???
//     ACTION: ???
//     PAS DE TITLE CAR REDIRECTION VERS LA PAGE DE DETAILS DU POST
//
// ROUTE DE SUPPRESSION D'UN POST:
//     PATTERN: /posts/id/slug-du-post/delete.html
//     CTRL: ???
//     ACTION: ???
//     PAS DE TITLE CAR REDIRECTION VERS LA PAGE D'ACCUEIL









 ?>
