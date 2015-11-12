<?php

include('includes/header.php');

include('admin/includes/init.php');


$photos = Photo::find_all();




?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <div class="thumbnails row">
                <?php foreach($photos as $photo): ?>

                    <div class="col-xs-6 col-md3">
                        <a class="thumbnail" href="photo.php?id=<?php echo $photo->id; ?>">
                            <img class="img-responsive home-page-photo" src="admin/<?php echo $photo->picture_path() ?>" alt="">
                       </a>
                    </div>
            <?php endforeach; ?>
                </div>
        </div>

            <!-- Blog Sidebar Widgets Column -->
<!--            <div class="col-md-4">-->
<!---->
<!--            -->
<!--                 --><?php //include("includes/sidebar.php"); ?>
<!---->
<!---->
<!---->
        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
