<?php

function get_siteinfo($item = null)
{
    switch($item)
    {
        case 'title' :
                return SITE_TITLE;

                break;
        case 'description' :

             return SITE_DESCRIPTION;

             break;
        default :
         return SITE_TITLE;
    }
}


function get_the_title($object = null)
{
    if($object == null)
    {
        global $page;

        return $page->title;
    }
    else
    {
        return $object->title;
    }
}



function get_content_path($content_type,$slug)
{
    $path = sprintf('%s/content/%s/%s',ABS_PATH,$content_type,$slug);

    return $path;
}

function get_body_classes()
{
    global $template_type,$page_slug;

    if(!empty($template_type) || !empty($page_slug) )
    {
        $classes = array('class="');
          if(!empty($template_type))
          {
              $classes[]=sprintf('template-%s',$template_type);
          }

          if(!empty($page_slug))
          {
              $classes[] = sprintf(' page-id-%s',$page_slug);
          }

        $classes[] = '"';

        return implode('',$classes);

    }

    return false;
}

function get_permalink($object = null)
{
    if($object == null)
    {
        global $page;

      $slug = $page->slug;
    }
    else
    {
       $slug = $object->slug;
    }

    return sprintf('%s',$slug);
}



function get_the_content($object)
{
    if($object == null)
    {
        global $page;

        return $page->content;
    }
    else
    {
        return $object->content;
    }
}

function get_the_excerpt($object,$length)
{
    $content = get_the_content($object);
    $excerpt = trim_words($content,$length);

    return $excerpt;
}

function get_the_author($object)
{
    if($object == null)
    {
        global $page;

        return $page->author;
    }
    else
    {
        return $object->author;
    }
}

function get_the_date($object)
{
    if($object == null)
    {
        global $page;

        return $page->date;
    }
    else
    {
        return $object->date;
    }
}