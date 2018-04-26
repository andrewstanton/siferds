<?php
/*
Plugin Name: List Category Posts - Template "Default"
Plugin URI: http://picandocodigo.net/programacion/wordpress/list-category-posts-wordpress-plugin-english/
Description: Template file for List Category Post Plugin for Wordpress which is used by plugin by argument template=value.php
Version: 0.9
Author: Radek Uldrych & Fernando Briano
Author URI: http://picandocodigo.net http://radoviny.net
*/

/*
Copyright 2009 Radek Uldrych (email : verex@centrum.cz)
Copyright 2009-2015 Fernando Briano (http://picandocodigo.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or any
later version.

This program is distributed in the hope that it will be useful, but
WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301
USA
*/

/**
* The format for templates changed since version 0.17.  Since this
* code is included inside CatListDisplayer, $this refers to the
* instance of CatListDisplayer that called this file.
*/

/* This is the string which will gather all the information.*/
$output = '';

//Add 'starting' tag. Here, I'm using an unordered list (ul) as an example:
$output .= '<div class="floor-plans-container">';

$output .= '<div class="row">';


global $post;
$i = 1;

while ( have_posts() ):
  the_post();

  $cat = get_the_category();
  $cat_id = $cat[0]->slug;
  $array = array('category_name' => $cat_id, 'post_type' => 'floor_plans', 'numberposts' => '-1');
  $postTotal = get_posts( $array );

  $count = count($postTotal);
  $colname = '';

  if(((int)$count % 4)==0){
    $colname = 'col-md-3 col-xs-6';
    }
  elseif(((int)$count % 3)==0){
    $colname = 'col-xs-4';
    }
  elseif(((int)$count % 2)==0){
    $colname = 'col-xs-6';
    }
  //Start a List Item for each post:
  $output .= "<div class=\"floor-list-item ".$colname." level-".get_the_ID()."\">";

  $thumb_id = get_post_thumbnail_id();
  $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
  $img_array = wp_get_attachment_image_src($thumb_id, 'full', true);
  $img_url = $img_array[0]; $thumb_url = $thumb_url_array[0];

  //Post Thumbnail
  $output .= '<a title="'.get_the_title().'" data-src="'.$img_url.'" class="thumbnail" data-toggle="modal" data-target="#levelModal" data-ix="'.$i.'"><div class="floor-thumbnail" style="background-image:url('.$thumb_url.')"></div>';

  $output .= '<div class="floor-item-name">'.get_the_title().'</div>';

  $output .= '</a></div>';

  $i++;

endwhile;

$output .= '</div>';//.row

// Close the wrapper I opened at the beginning:
$output .= '</div>';

$this->lcp_output = $output;
