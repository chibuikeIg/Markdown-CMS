<?php 

function widget_categories($title = 'Categories')
{
    $categories = get_categories();
    if(empty($categories))
    {
        return false;
    }

    $widget = '<div class="widget widget=categories">';
    $widget .=sprintf('<h4>%s</h4>',$title);
    $widget .='<ol class="list-unstyleed mb-0 post-list">';

    foreach($categories as $category)
    {
        $widget .=sprintf('<li class="category-list-item"><a href="%s">%s</a></li>',get_category_link($category['slug']),$category['name']);
    }
    $widget .='</ol></div>';

    echo $widget;
}


function widget_latest_posts($title ='Latest Posts',$num_posts=5 )
{
    $posts= get_posts();

    if(empty($posts))
    {
        return false;
    }

    $widget = '<div class="widget widget-latest-posts">';
    $widget .=sprintf('<h4>%s</h4>',$title);
    $widget .='<ol class="list-unstyled mb-0 post-list">';

    $count = 1;

    foreach ($posts as $post)
    {
        if($count <= $num_posts )
        {
            $widget .=sprintf('<li class="post-list-item"><a href="/markdown/%s">%s</a></li>',get_permalink($post),get_the_title($post));
            $count++;
        }
    }

    $widget .='</ol></div>';

    echo $widget;

}


function widget_text($title='A Text Widget ',$html="Text goes here. HTML supported")
{
    $widget = '<div class="widget widget-text">';
    $widget .=sprintf('<h4>%s</h4>',$title);
    $widget .=$html;
    $widget .='</div>';


    echo $widget;
}