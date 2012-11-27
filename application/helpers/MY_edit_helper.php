<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('edit_link'))
{
    function edit_link($var = '', $text = '', $class = '')
    {
    	$anchor = '<a href="'.$var.'" class="'.$class.'">'.$text.'</a>';
        return $anchor;
    }   
}