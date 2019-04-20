<?php
function has_image($object =null)
{
    

    if($object == null )
    {
        global $page;

        if(!empty($page->image))
        {
            return true;
        }
    }
    else
    {
        if(!empty($object->image))
        {
            return true;
        }
    }

    return false;
}

function get_the_image($object = null)
{
    if($object == null)
    {
        global $page;

        return $page->image;
    }
    else
    {
        return $object->image;
    }

    return false;
}


function the_image($size ='full',$object=null)
{
    global $image_sizes;

    if(!in_array($size,array_keys($image_sizes)))
    {
        $size = 'full';
    }

    $image_url = get_the_image($object);

    $image = sprintf('<img src="%s" class="roark-image-%s" width = "%s" height="%s">',$image_url,$size,get_the_title($object),$image_sizes[$size]['width'],$image_sizes[$size]['height']);

    echo $image;

}