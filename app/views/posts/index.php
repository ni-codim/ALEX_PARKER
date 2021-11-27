<?php
/*
  ./app/views/posts/index.php
  Variables disponibles :
    - $posts: ARRAY(ARRAY(id, title, text, created_at, quote, category_id))
*/
 ?>


<!-- ADD A POST -->
 <div>
   <a href="form.html" type="button" class="btn btn-primary"
     >Add a Post</a
   >
 </div>
 <!-- ADD A POST END -->

<!-- LISTE DES POSTS -->
 <?php foreach ($posts as $post):
    $created_at = strtotime($post['created_at']);
 ?>
   <!-- Blog Post Start -->
   <div class="col-md-12 blog-post row">
     <div class="post-title">
       <a href="single.html"
         ><h1>
          <?php echo $post['title']; ?>
         </h1></a
       >
     </div>
     <div class="post-info">
       <span><?php echo date('Y',$created_at);?>-<?php echo date('m',$created_at);?>-<?php echo date('d',$created_at);?>
       </span> | <span>Life style</span>
     </div>
     <p>
       <?php echo $post['text']; ?>
     </p>
     <a
       href="single.html"
       class="
         button button-style button-anim
         fa fa-long-arrow-right
       "
       ><span>Read More</span></a
     >
   </div>
   <!-- Blog Post End -->

 <?php endforeach; ?>