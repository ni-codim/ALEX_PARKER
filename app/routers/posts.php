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
endswitch;










 ?>
