<?php
/*
  ./app/views/templates/index.php
  TEMPLATE PRINCIPAL
*/
 ?>

 <!DOCTYPE html>
 <html lang="en">
   <?php include '../app/views/templates/partials/_head.php'; ?>

   <body>

     <?php include '../app/views/templates/partials/_preloader.php'; ?>

     <div id="main">
       <div class="container">
         <div class="row">

           <?php include '../app/views/templates/partials/_aside.php'; ?>

           <?php include '../app/views/templates/partials/_main.php'; ?>

         </div>
       </div>
     </div>

     <!-- Back to Top Start -->
     <a href="#" class="scroll-to-top"><i class="fa fa-long-arrow-up"></i></a>
     <!-- Back to Top End -->

     <?php include '../app/views/templates/partials/_scripts.php'; ?>

   </body>
 </html>
