<?php

function home_url()
{
    return ABS_URL;
}

function title_tag()
{
    global $template_type;

    $title_parts = array();

    if($template_type == 'category')
    {
        $title_parts[] = 'Category : ';
    }

    $title_parts[] = get_the_title();

    $title = implode('',$title_parts);

    echo $title;
}

function body_classes()
{
    echo get_body_classes();
}

function the_title($object = null)
{
    echo get_the_title($object);
}

function the_content($object=null)
{
    echo get_the_content($object);
}

function the_author($object = null)
{
    echo get_the_author($object);
}

function the_date($object = null)
{
    echo get_the_date($object);
}


function the_excerpt($object = null,$length = 200)
{
    echo get_the_excerpt($object,$length);
}