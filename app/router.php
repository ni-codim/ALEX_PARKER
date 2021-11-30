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
