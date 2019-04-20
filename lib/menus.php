<?php

function nav_menu($menu)
{
    $menu_raw = file_get_contents(get_content_path('menu',$menu));

    if(!$menu_raw)
    {
        return false;
    }

    $menu_items = json_decode($menu_raw);
    $menu = '<ul class="navbar-nav mr-auto">';

    foreach ($menu_items as $slug=>$title)
    {
        $url = ($slug == 'home' ? home_url() : sprintf('%s/%s',home_url(),$slug));

        $menu .=sprintf('<li class="nav-item"><a class="nav-link" href="%s">%s</a></li>',$url,$title);
    }

    $menu .= '</ul>';

    echo $menu;
}