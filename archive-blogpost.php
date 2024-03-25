<?php
/**
 * Template Name: Blog Archives
 */
use Lean\Load;
get_header();

Load::organism( 'hero-blog/hero-blog' );

Load::organism( 'blog/blog-featured' );

Load::organism( 'blog/blog-list' );

Load::organism( 'blog/blog-pagination' );

get_footer();
