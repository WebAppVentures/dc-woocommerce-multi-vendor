<?php
/**
 * The template for displaying vendor dashboard
 *
 * Override this template by copying it to yourtheme/dc-product-vendor/vendor-dashboard/vendor-university.php
 *
 * @author 		WC Marketplace
 * @package 	WCMp/Templates
 * @version   2.2.0
 */
if (!defined('ABSPATH')) {
    // Exit if accessed directly
    exit;
}
global $woocommerce, $WCMp;
$university_args = array(
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_type' => 'wcmp_university',
    'post_status' => 'publish',
    'suppress_filters' => true
);
$university_posts = get_posts($university_args);
$count_university = count($university_posts);
?>
<div class="col-md-12">
    <?php
        if(count($university_posts) > 0){
    ?>
    <div id="wcmp_frontend_accordian">
        <?php wp_reset_postdata();
        foreach ($university_posts as $university_post) {
            setup_postdata($university_post);
            if ($university_post->post_title != '') { ?>
                <div>				
                    <div class="msg_title_box2"><span class="title"><?php echo $university_post->post_title; ?></span><br> </div>
                    <div class="clear"></div>
                </div>
                <div>
                    <div class="university_text"> 
                <?php the_content(); ?>
                    </div>
                </div>
        <?php }
    } wp_reset_postdata(); ?>			
    </div>
    <?php
        }
    ?>
<?php
if ($count_university == 0) {
    echo '<div class="panel panel-default panel-pading text-center empty-panel">' . __('Sorry no knowledgebase found', 'dc-woocommerce-multi-vendor') . "</div>";
}
?>
</div>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(function () {
            $("#wcmp_frontend_accordian").accordion({
                speed: 'slow',
                heightStyle: "content",
                collapsible: true,
            });
        });
    });
</script>		