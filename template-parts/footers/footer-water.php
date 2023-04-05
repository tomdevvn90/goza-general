<?php
$bg_image = __get_field('goza_ft_bg_image', 'option');
if ($bg_image) {
    $style = 'background-image: url(' . $bg_image['url'] . ')';
}
//general
$goza_ft_general_op = __get_field('goza_ft_general_op', 'option');
if ($goza_ft_general_op) {
    $goza_ft_logo = $goza_ft_general_op['goza_ft_logo'];
    $goza_general_heading = $goza_ft_general_op['goza_general_heading'];
    $goza_general_content = $goza_ft_general_op['goza_general_content'];
}

//quicklink
$goza_ft_quick_links_op = __get_field('goza_ft_quick_links_op', 'option');
if ($goza_ft_quick_links_op) {
    $goza_ql_heading = $goza_ft_quick_links_op['goza_ql_heading'];
}

//Instagram
$goza_ft_ig_op = __get_field('goza_ft_ig_op', 'option');
if ($goza_ft_ig_op) {
    $goza_ig_heading = $goza_ft_ig_op['goza_ig_heading'];
}

//newsletter
$goza_sub_news_op = __get_field('goza_sub_news_op', 'option');
if ($goza_sub_news_op) {
    $goza_newsletter_heading = $goza_sub_news_op['goza_newsletter_heading'];
    $goza_newsletter_desc = $goza_sub_news_op['goza_newsletter_desc'];
    $goza_sc_sub_form = $goza_sub_news_op['goza_sc_sub_form'];
}

//copyright
$goza_txt_copyright = __get_field('goza_txt_copyright', 'option');
?>

<footer id="site-footer" class="main-footer footer-water" style="<?= esc_attr($style) ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-3 main-footer-widget">
                <?php if ($goza_ft_logo) { ?>
                    <a href="/" class="main-footer-logo">
                        <img src="<?= esc_url($goza_ft_logo) ?>" alt="Logo" />
                    </a>
                <?php } ?>
                <?php if (isset($goza_newsletter_heading) && !empty($goza_newsletter_heading)) { ?>
                    <h3 class="main-footer-title"><?= $goza_newsletter_heading ?></h3>
                <?php } ?>
                <?php if (isset($goza_newsletter_desc) && !empty($goza_newsletter_desc)) { ?>
                    <div class="main-footer-desc"><?= $goza_newsletter_desc ?></div>
                <?php } ?>
            </div>
            <div class="col-md-3 main-footer-widget">
                <?php if (isset($goza_ql_heading) && !empty($goza_ql_heading)) { ?>
                    <h3 class="main-footer-title"><?= $goza_ql_heading ?></h3>
                <?php } ?>
                <div class="main-footer-menu">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'quicklink-menu',
                        'menu_class' => 'quicklinks-menu',
                        'container_class' => 'menu-container',
                        'items_wrap' => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                        'bootstrap' => false
                    ]);
                    ?>
                </div>
            </div>
            <div class="col-md-3 main-footer-widget">
                <?php if (isset($goza_ig_heading) && !empty($goza_ig_heading)) { ?>
                    <h3 class="main-footer-title"><?= $goza_ig_heading ?></h3>
                <?php } ?>

            </div>
            <div class="col-md-3 main-footer-widget">
                <?php if (isset($goza_general_heading) && !empty($goza_general_heading)) { ?>
                    <h3 class="main-footer-title"><?= $goza_general_heading ?></h3>
                <?php } ?>
                <?php if (isset($goza_general_content) && !empty($goza_general_content)) { ?>
                    <div class="main-footer-desc"><?= $goza_general_content ?></div>
                <?php } ?>
                <?php if (have_rows('goza_social_network', 'option')) { ?>
                    <ul class="main-footer-social">
                        <?php
                        while (have_rows('goza_social_network', 'option')) : the_row();
                            $icon = get_sub_field('icon');
                            $url = get_sub_field('url');
                            echo '<li><a href="' . esc_url($url) . '" target="_blank"><i class="fa fa-' . esc_attr($icon['value']) . '" aria-hidden="true"></i></a></li>';
                        endwhile; ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
        <div class="main-footer-socket">
            <?php if (isset($goza_txt_copyright) && !empty($goza_txt_copyright)) { ?>
                <p><?= $goza_txt_copyright ?></p>
            <?php } ?>
            <div id="back-to-top">Back to top <i class="fa fa-chevron-up" aria-hidden="true"></i></div>
        </div>
    </div>

</footer>