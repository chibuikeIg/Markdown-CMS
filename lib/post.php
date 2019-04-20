<?php

function get_posts()
{
    $posts_dir = sprintf('%s/content/posts',ABS_PATH);

    $files=array_filter(scandir($posts_dir),function($item) use ($posts_dir){
        return !is_dir($posts_dir.'/'.$item);
    });

    if(empty($files))
    {
        return false;
    }

    $posts= array();

    foreach($files as $file)
    {
        $posts[] = get_post($file);
    }

    array_sort_by_column($posts,'date');

    return $posts;
}

function get_post($slug)
{
    $path = get_content_path('posts',$slug);

    if(!file_exists($path))
    {
        return false;
    }

    $markdown = file_get_contents($path);

    $post = parse($markdown);

    return $post;
}