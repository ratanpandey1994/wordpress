<?php
function pageBanner(){
?>
<div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(<?php $pageBannerImage = get_field('page_banner_background_image'); echo $pageBannerImage['sizes']['pageBanner']  ?>)"></div>
            <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"><?php the_title(); ?></h1>
                <div class="page-banner__intro">
                <p><?php the_field('banner_page_sub-title'); ?></p>
                </div>
            </div>
        </div>

<?php
}
    function practice_files(){

        wp_enqueue_script('main-js', get_theme_file_uri('/js/script.js'), NULL, '1.0', true);

        wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        wp_enqueue_style('main_style', get_stylesheet_uri());
    }
    add_action('wp_enqueue_scripts', 'practice_files');



    function practice_feature() {

        register_nav_menu('headerMenuLocation', 'Header Menu Header');
        register_nav_menu('footerLocationOne', 'Footer Location One');
        register_nav_menu('footerLocationTwo', 'Footer Location Two');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_image_size('professorLandscape', 400, 260, true);
        add_image_size('professorPortrait', 480, 650, true);
        add_image_size('pageBanner', 1500, 350, true);
    }

    add_action('after_setup_theme', 'practice_feature');


    function univesity_adjust_query($query){

        
        if(!is_admin() AND is_post_type_archive() AND $query->is_main_query()){
            $today = date('Ymd');
            $query->set('meta_key',  'event_date');
            $query->set('orderby',  'meta_value_num');
            $query->set('order',  'ASC');
            $query->set('meta_query',  array(
                array(
                  'key' => 'event_date',
                  'compare' => '>=',
                  'value' => $today,
                  'type' => 'numeric'
                )
              ));
        }
    }

    add_action('pre_get_posts', 'univesity_adjust_query');

?>

