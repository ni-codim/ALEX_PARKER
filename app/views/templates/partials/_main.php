<?php
/*
  ./app/views/templates/partials/_main.php
*/
 ?>

 <div id="main">
   <div class="container">
     <div class="row">
       <!-- About Me (Left Sidebar) Start -->
       <?php include '../app/views/templates/partials/_leftsidebar.php'; ?>
       <!-- About Me (Left Sidebar) End -->

       <!-- Blog Post (Right Sidebar) Start -->
       <?php include '../app/views/templates/partials/_rightsidebar.php'; ?>
       <!-- Blog Post (Right Sidebar) End -->
     </div>
   </div>
 </div>

 <!-- Back to Top Start -->
 <a href="#" class="scroll-to-top"><i class="fa fa-long-arrow-up"></i></a>
 <!-- Back to Top End -->
