<?php
include('header.php');
?>
<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title"><?php the_title(); ?></h2>
                <p class="blog-post-meta">
                    <?php the_date(); ?> by <?php the_author(); ?>
                </p>
                <?php if(has_image()) :  ?>
                <?php the_image(); ?>
<?php endif; ?>
<?php the_content(); ?>
<?php the_post_categories(); ?>
            </div>
        </div>
    </div>
</main>
<?php 
include('sidebar.php');
?>
<?php 
include('footer.php');
?>
