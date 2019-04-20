<?php include('header.php') ?>
<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">
        Category: <?php the_title(); ?> 
    </h1>
    <?php if(has_image()) : ?>
    <?php the_image(); ?>
<?php endif; ?>
<div class="lead"><?php the_content(); ?></div>
<?php $category_posts = get_category_posts();?>
<div class="container category-posts">
    <div class="row">
        <?php foreach($category_posts as $category_post) : ?>
        <div class="col-md-4">
            <div class="blog-post text-left">
                <h2 class="blog-post-title">
                    <a href="/markdown/<?php echo get_permalink($category_post); ?>"><?php the_title($category_post); ?></a>
                </h2>
                <p class="blog-post-meta"><?php the_date($category_post) ?> by <?php the_author($category_post); ?></p>
                <?php if(has_image($category_post)) : ?>
                <a href="/markdown/<?php echo get_permalink($category_post); ?>">
                <?php the_image('thumb',$category_post); ?>
                </a>
                <?php endif;?>
                <?php the_excerpt($category_post) ?>
                <p class="readmore">
                    <a class="btn btn-primary" href="<?php echo '/markdown/'.get_permalink($category_post); ?>">Read More</a>
                </p>
            </div>
        </div>
<?php endforeach; ?>
    </div>
</div>
</div>
<?php include('footer.php'); ?>