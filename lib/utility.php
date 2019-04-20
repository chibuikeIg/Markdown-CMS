<?php 

function array_sort_by_column(&$arr,$col,$dir =SORT_DESC )
{
    $sort_col = array();

    foreach ($arr as $key=>$row)
    {
        $sort_col[$key] = strtotime($row->$col);
    }

    array_multisort($sort_col,$dir,$arr);
}


function trim_words($string,$limit,$break=".",$pad="...")
{
    if(strlen($string) <= $limit ) return $string;

    if(false !== ($breakpoint = strpos($string,$break,$limit) ))
    {
        if($breakpoint < strlen($string) -1 ){
            $string = substr($string,0,$breakpoint).$pad;
        }
    }

    return $string;
}