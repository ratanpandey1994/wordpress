<?php 
    get_header(); 
?>

    <div class="page-banner">
          <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>)"></div>
          <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">All Programs</h1>
            <div class="page-banner__intro">
              <p>See what is going on in our world.</p>
            </div>
          </div>
    </div>

    <div class="container container--narrow page-section">

<ul class="link-list min-list">

<?php
  $args = array(
              'post_type' => 'program',
              'posts_per_page' => -1,
              'orderby' => 'title',
              'order' => 'ASC'
          );
  $program_query = new WP_Query($args);
  while ($program_query->have_posts()) : $program_query->the_post();
    
?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php //echo get_post_meta( get_the_id(), 'banner_page_sub-title', true ); ?>
    <?php //the_field('banner_page_sub-title'); ?>
  <?php endwhile;
  wp_reset_postdata();
  echo paginate_links();
?>
</ul>



</div>

<?php get_footer();

?>