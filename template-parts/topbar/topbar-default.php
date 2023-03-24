<?php
$goza_topbar_options = __get_field('goza_topbar_options', 'option');
$goza_en_social = $goza_topbar_options['goza_en_social'];
$goza_label_social = $goza_topbar_options['goza_label_social'];
?>
<div class="goza-topbar goza-topbar-default">
    <div class="container">
        <div class="row no-gutters text-center goza-topbar-inner">
            <?php if (isset($goza_en_social) && $goza_en_social) { ?>
                <div class="col-3 goza-topbar-item">
                    <span class="goza-topbar-item--label"><?= $goza_label_social ?></span>
                    <?php
                    if (have_rows('goza_social_network', 'option')) :
                        echo '<ul class="goza-topbar-social">';
                        while (have_rows('goza_social_network', 'option')) : the_row();
                            $icon = get_sub_field('icon');                            
                            $url = get_sub_field('url');
                            echo '<li><a href="' . $url . '" target="_blank"><i class="fa fa-' . $icon['value'] . '" aria-hidden="true"></i></a></li>';
                        endwhile;
                        echo '</ul>';
                    endif;
                    ?>
                </div>
            <?php  } ?>
            <div class="col-3 goza-topbar-item">2</div>
            <div class="col-3 goza-topbar-item">3</div>
            <div class="col-3 goza-topbar-item">4</div>
        </div>
    </div>
</div>