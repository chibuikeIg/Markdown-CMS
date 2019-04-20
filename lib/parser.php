<?php

function split_document($raw_document)
{
    $pattern = '/\s+={3,}\s+/';

    return preg_split($pattern,$raw_document);
}

function parse_meta($meta)
{
    return json_decode($meta);
}

function parse($markdown)
{
    $parts = split_document($markdown);
    $result = parse_meta($parts[0]);
    $result->content = $parts[1];

    return $result;

}