<?php
/*
    ./app/router.php
    ROUTEUR PRINCIPAL
*/


// ROUTEUR DES POSTS
//   PATTERN: index?posts=x
//   ROUTEUR: postsRouter
if (isset($_GET['posts'])) :
  include_once '../app/routers/posts.php';

// ROUTE PAR DEFAUT: liste des posts
//   PATTERN: /
//   CTRL: postsController
//   ACTION: index
//   TITLE: Alex Parker - Blog
else:
  include_once '../app/controllers/postsController.php';
  \App\Controllers\PostsController\indexAction($conn);
endif;




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
