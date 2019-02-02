<?php /*
Plugin Name: Monster Gallery
Plugin URI: https://moshikov.co/
Description: Customise classic Gutenberg gallery. Add carousels slider (Flickity) and lightbox (Fancybox) script.
Version: 1.0
Author: Vladislav Moshikov
Author URI: http://moshikov.co/
Copyright: Vladislav Moshikov
Text Domain: monster-gallery
License: GPL3
*/

    // Flickity library (https://flickity.metafizzy.co/)
    wp_enqueue_script( 'mscript_flickity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js');
    wp_enqueue_script( 'mscript_flickitylazy', 'https://unpkg.com/flickity-bg-lazyload@1/bg-lazyload.js');
    wp_enqueue_style('mstyle_flickity', 'https://unpkg.com/flickity@2/dist/flickity.min.css');

    // Fancybox library (https://fancyapps.com/fancybox/3/)
    wp_enqueue_script( 'mscript_fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js');
    wp_enqueue_style('mstyle_fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css');

    // Plugin elements
    wp_enqueue_script( 'mscript_scripts', plugins_url( 'assets/js/script.js', __FILE__ ));
    wp_enqueue_style( 'mscript_style', plugins_url( 'assets/css/style.css', __FILE__ ));



function monsterGallery() {
    wp_enqueue_script('mediaism-guten-script', 
      plugins_url( 'assets/js/monster-gallery.js', __FILE__ ), 
      array('wp-blocks', 'wp-dom-ready', 'wp-edit-post')
    );
  }
  add_action( 'enqueue_block_editor_assets', 'monsterGallery' );
  
?>