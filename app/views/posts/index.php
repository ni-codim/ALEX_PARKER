<?php
/*
  ./app/views/posts/index.php
  Variables disponibles :
    - $posts: ARRAY(ARRAY(id, title, text, created_at, quote, category_id))
*/
 ?>
<div class="col-md-12 content-page">

<!-- ADD A POST -->
 <div>
   <a href="form.html" type="button" class="btn btn-primary"
     >Add a Post</a
   >
 </div>
 <!-- ADD A POST END -->

<!-- LISTE DES POSTS -->

   <!-- Blog Post Start -->
   <div class="col-md-12 blog-post row">
     <?php foreach ($posts as $post):?>
     <div class="post-title">
       <a href="<?php echo $post['id']; ?>/<?php echo \Core\Functions\slugify($post['title']); ?>">
         <h1>
          <?php echo $post['title']; ?>
         </h1>
       </a>
     </div>
     <div class="post-info">
       <span>
         <?php
          echo \Core\Functions\datify($post['created_at']);
          ?>

       </span> | <span>Life style</span>
     </div>
     <p>
       <?php echo \Core\Functions\truncate($post['text']); ?>
     </p>
     <a
       href="single.html"
       class="
         button button-style button-anim
         fa fa-long-arrow-right
       "
       ><span>Read More</span></a
     >
     <?php endforeach; ?>

   </div>
 <!-- Blog Post End -->
 </div>
