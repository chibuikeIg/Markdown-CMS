<?php

function get_page($slug)
{
    $path = get_content_path('page',$slug);

    if(!file_exists($path))
    {
        return false;
    }

    $markdown = file_get_contents($path);

    $page = parse($markdown);

    return $page;
}