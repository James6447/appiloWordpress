<?php

/**
 * Review notice
 */
function parallel_review_notice() {
    global $current_user ;
        $user_id = $current_user->ID;
    if ( ! get_user_meta($user_id, 'parallel_review_nag_ignore') ) { ?>
        <div class="notice notice-success is-dismissible">
        <p><?php _e('Love using Parallel? Submit a review and tell us how Parallel helped you build your website.', 'parallel'); ?> <a class="button button-primary" target="_blank" href="<?php echo esc_url('https://wordpress.org/support/theme/parallel/reviews/#new-post'); ?>"><?php esc_html_e('Sure! I\'d love to review Parallel', 'parallel'); ?></a> <a class="button" href="<?php echo esc_url( admin_url( '?parallel_review_nag_ignore=0' ) ); ?>"><?php esc_html_e('No thanks', 'parallel'); ?></a></p>
        </div>
    <?php }
}
add_action('admin_notices', 'parallel_review_notice', 100);

function parallel_review_nag_ignore() {
    global $current_user;
        $user_id = $current_user->ID;
        if ( isset($_GET['parallel_review_nag_ignore']) && '0' == $_GET['parallel_review_nag_ignore'] ) {
             add_user_meta($user_id, 'parallel_review_nag_ignore', 'true', true);
    }
}
add_action('admin_init', 'parallel_review_nag_ignore');