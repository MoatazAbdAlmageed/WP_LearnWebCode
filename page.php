<?php
/* 
The Page template file
 */
get_header();

?>


  <!-- Three columns of text below the carousel -->
  <article class="row content" id="page">
    <div class="col-lg-12">
      <h2>
        <?php the_title( ) ?>
      </h2>
      <?php 

  wp_reset_query(); // necessary to reset query
    while ( have_posts() ) : the_post();
        the_content();
    endwhile; // End of the loop.
?>
    </div>

    <?php get_footer();   ?>