<?php 

function get_categories()
{
    $file = file_get_contents(ABS_PATH.'/content/categories');

    return json_decode($file,true);
}

function get_category_posts()
{
    global $page;
    $post_slugs = $page->posts__in;
    
    if(empty($post_slugs))
    {
        return false;
    }

    $posts = array();

    foreach($post_slugs as $slug)
    {
        $posts[]= get_post($slug);
        
    }

    array_sort_by_column($posts,'date');

    return $posts;
}

function get_category_link($category_slug)
{
    return sprintf('/markdown/category/%s',$category_slug);
}

function get_post_categories($post_slug = null)
{
    global $page;

    if($post_slug == null )
    {
        $post_slug = $page->slug;
    }

    $categories = get_categories();

    if(empty($categories))
    {
        return array();
    }

    $post_categories = array();

    foreach($categories as $category_slug=>$category_data)
    {
        if(in_array($post_slug,$category_data['posts']))
        {
            $post_categories[]=$categories[$category_slug];
        }
    }

    return $post_categories;
}

function the_post_categories()
{
    $post_categories = get_post_categories();
    ?>
    <div class="post-categories">
        <span class="post-category-list-header">Categories: </span>
        <?php if(empty($post_categories)) :
                echo "none";
              else :
                    $array_keys = array_keys($post_categories);
                    $last_key = end($array_keys);

                foreach($post_categories as $key=>$category) :
                        $coma = ( $key == $last_key ? "":', ' );
                       printf('<span class="post-category-list-item"><a href="%s">%s</a></span>%s',get_category_link($category['slug']),$category['name'],$coma);
                endforeach;

            endif; ?>
    </div>
    <?php
}