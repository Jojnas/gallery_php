<?php

include('includes/header.php');

include('admin/includes/init.php');


$photos = Photo::find_all();




?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


            </div>

            <!-- Blog Sidebar Widgets Column -->
<!--            <div class="col-md-4">-->
<!---->
<!--            -->
<!--                 --><?php //include("includes/sidebar.php"); ?>
<!---->
<!---->
<!---->
<!--        </div>-->
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
