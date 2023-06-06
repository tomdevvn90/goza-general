<?php
function be_item_event($is_style)
{

    switch ($is_style) {
        case strpos($is_style, 'is-style-ev-list') !== false:
            be_template_ev_list();
            break;

        case strpos($is_style, 'is-style-ev-fill') !== false:
            be_template_ev_fill();
            break;

        case strpos($is_style, 'is-style-ev-outline') !== false:
            be_template_ev_outline();
            break;

        case strpos($is_style, 'is-style-ev-special') !== false:
            be_template_ev_special();
            break;

        default:
            be_template_ev_default();
            break;
    }
}

function be_template_ev_list()
{
    $day         = tribe_get_start_date(get_the_ID(), true, 'j');
    $month       = tribe_get_start_date(get_the_ID(), true, 'F');
    $time        = tribe_get_start_date(get_the_ID(), true, 'G:i a');
    $author_id   = get_the_author_meta('ID');
    $author_name = get_the_author_meta('display_name', $author_id);
    $venue       = tribe_get_venue(get_the_ID());

?>
    <div class="item-event">
        <div class="item-event-inner">
            <div class="item-event--start-date">
                <span class="item-event--start-date__day"> <?php echo $day ?> </span>
                <span class="item-event--start-date__month"> <?php echo $month ?> </span>
            </div>

            <div class="item-event--meta">
                <div class="item-event--time">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 443.294 443.294" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                        <g>
                            <path d="M221.647 0C99.433 0 0 99.433 0 221.647s99.433 221.647 221.647 221.647 221.647-99.433 221.647-221.647S343.861 0 221.647 0zm0 415.588c-106.941 0-193.941-87-193.941-193.941s87-193.941 193.941-193.941 193.941 87 193.941 193.941-87 193.941-193.941 193.941z" fill="#000000" data-original="#000000" class=""></path>
                            <path d="M235.5 83.118h-27.706v144.265l87.176 87.176 19.589-19.589-79.059-79.059z" fill="#000000" data-original="#000000" class=""></path>
                        </g>
                    </svg>
                    <span><?php echo $time ?> - By <?php echo $author_name ?></span>
                </div>

                <h3 class="item-event--name">
                    <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                </h3>

                <?php if (!empty($venue)) : ?>
                    <div class="item-event--venue">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 682.667 682.667" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <defs>
                                    <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                        <path d="M0 512h512V0H0Z" fill="#000000" data-original="#000000"></path>
                                    </clipPath>
                                </defs>
                                <g clip-path="url(#a)" transform="matrix(1.33333 0 0 -1.33333 0 682.667)">
                                    <path d="M0 0c-60 90-165 212-165 317 0 90.981 74.019 165 165 165s165-74.019 165-165C165 212 60 90 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(256 15)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                                    <path d="M0 0c-41.353 0-75 33.647-75 75s33.647 75 75 75 75-33.647 75-75S41.353 0 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(256 257)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                                </g>
                            </g>
                        </svg>
                        <span><?php echo $venue ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php }

function be_template_ev_default()
{
    $ev_img_url    = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $ev_button_style = __get_field('ev_button_style') ?: ['goza_button_style' => 'btn-default'];
    if (is_plugin_active('the-events-calendar/the-events-calendar.php')) {
        $start_date = tribe_get_start_date(get_the_ID(), true, 'j M Y - G:i a, l');
    }
?>
    <div class="item-event __hide">
        <div class="item-event-inner">
            <div class="item-event-inner-left">
                <?php if (!empty($ev_img_url)) : ?>
                    <div class="item-event--thumbnail">
                        <img src="<?php echo $ev_img_url ?>" alt="<?php the_title() ?>">
                        <span class="item-event--icon-toggle"></span>
                    </div>
                <?php endif; ?>

                <div class="item-event--meta">
                    <h3 class="item-event--name">
                        <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                    </h3>

                    <?php if (!empty($start_date)) : ?>
                        <span class="item-event--start-date"> <?php echo $start_date ?> </span>
                    <?php endif; ?>

                    <div class="item-event--excerpt"> <?php the_excerpt() ?> </div>
                </div>
            </div>

            <div class="item-event-inner-right">
                <div class="item-event--cta be-button be-button-<?= esc_attr($ev_button_style['goza_button_style']) ?>">
                    <a href="<?= the_permalink() ?>" class="btn <?= esc_attr($ev_button_style['goza_button_style']) ?>">
                        <?= esc_html__('Join Us', 'goza') ?>
                        <?php if ($ev_button_style['goza_button_style'] == 'btn-water') { ?>
                            <svg class="wgl-dashes inner-dashed-border animated-dashes">
                                <rect rx="0%" ry="0%"> </rect>
                            </svg>
                        <?php } ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php
}

function be_template_ev_fill()
{
    if (is_plugin_active('the-events-calendar/the-events-calendar.php')) {
        $day         = tribe_get_start_date(get_the_ID(), true, 'j F');
        $count_down  = tribe_get_start_date(get_the_ID(), true, 'm-d-Y G:i:s');
        $time        = tribe_get_start_date(get_the_ID(), true, 'G:i a');
        $venue       = tribe_get_venue(get_the_ID());
        $excerpt  = get_the_excerpt(get_the_ID());
    }
?>
    <div class="item-event">
        <div class="item-event-inner">
            <div class="item-event--date">
                <?php if (!empty($day)) : ?>
                    <span class="item-event--date-day"> <?php echo $day ?> </span>
                <?php endif; ?>

                <?php if (!empty($time)) : ?>
                    <span class="item-event--date-time">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 443.294 443.294" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <path d="M221.647 0C99.433 0 0 99.433 0 221.647s99.433 221.647 221.647 221.647 221.647-99.433 221.647-221.647S343.861 0 221.647 0zm0 415.588c-106.941 0-193.941-87-193.941-193.941s87-193.941 193.941-193.941 193.941 87 193.941 193.941-87 193.941-193.941 193.941z" fill="#000000" data-original="#000000" class=""></path>
                                <path d="M235.5 83.118h-27.706v144.265l87.176 87.176 19.589-19.589-79.059-79.059z" fill="#000000" data-original="#000000" class=""></path>
                            </g>
                        </svg>
                        <p><?php echo $time ?></p>
                    </span>
                <?php endif; ?>
            </div>

            <h3 class="item-event--name">
                <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
            </h3>
            <?php if (!empty($venue)) : ?>
                <div class="item-event--venue">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 682.667 682.667" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                        <g>
                            <defs>
                                <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                    <path d="M0 512h512V0H0Z" fill="#000000" data-original="#000000"></path>
                                </clipPath>
                            </defs>
                            <g clip-path="url(#a)" transform="matrix(1.33333 0 0 -1.33333 0 682.667)">
                                <path d="M0 0c-60 90-165 212-165 317 0 90.981 74.019 165 165 165s165-74.019 165-165C165 212 60 90 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(256 15)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                                <path d="M0 0c-41.353 0-75 33.647-75 75s33.647 75 75 75 75-33.647 75-75S41.353 0 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(256 257)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                            </g>
                        </g>
                    </svg>
                    <span> <?php echo $venue ?> </span>
                </div>
            <?php endif; ?>

            <div class="item-event--excerpt">
                <?php echo goza_expandable_excerpt($excerpt); ?>
            </div>

            <div class="item-event--count-down" data-count-down="<?= esc_attr($count_down) ?>">
                <div id="be-count-down--result" class="be-count-down--result"> </div>
            </div>

        </div>
    </div>
<?php }

function be_template_ev_outline()
{
    $ev_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    if (is_plugin_active('the-events-calendar/the-events-calendar.php')) {
        $day   = tribe_get_start_date(get_the_ID(), true, 'j');
        $month = tribe_get_start_date(get_the_ID(), true, 'F Y -');
        $time  = tribe_get_start_date(get_the_ID(), true, 'G:i a');
        $venue = tribe_get_venue(get_the_ID());
    }
?>
    <div class="item-event">
        <div class="item-event-inner">
            <div class="item-event--thumbnail">
                <img src="<?php echo $ev_img_url ?>" alt="<?php the_title() ?>" />
            </div>

            <div class="item-event--meta">
                <h3 class="item-event--name">
                    <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                </h3>

                <?php if (!empty($venue)) : ?>
                    <div class="item-event--venue">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 682.667 682.667" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <defs>
                                    <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                        <path d="M0 512h512V0H0Z" fill="#000000" data-original="#000000"></path>
                                    </clipPath>
                                </defs>
                                <g clip-path="url(#a)" transform="matrix(1.33333 0 0 -1.33333 0 682.667)">
                                    <path d="M0 0c-60 90-165 212-165 317 0 90.981 74.019 165 165 165s165-74.019 165-165C165 212 60 90 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(256 15)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                                    <path d="M0 0c-41.353 0-75 33.647-75 75s33.647 75 75 75 75-33.647 75-75S41.353 0 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(256 257)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                                </g>
                            </g>
                        </svg>
                        <span> <?php echo $venue ?> </span>
                    </div>
                <?php endif; ?>

                <div class="item-event--start-date">
                    <?php if (!empty($day)) : ?>
                        <span class="item-event--start-date-day"> <b><?php echo $day ?></b> <?php echo $month ?> </span>
                    <?php endif; ?>

                    <?php if (!empty($time)) : ?>
                        <span class="item-event--start-date-time"> <?php echo $time ?> </span>
                    <?php endif; ?>
                </div>

                <div class="item-event--cta">
                    <a href="<?php the_permalink() ?>">
                        View Details
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php }


function be_template_ev_special()
{
    $ev_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    if (is_plugin_active('the-events-calendar/the-events-calendar.php')) {
        $day        = tribe_get_start_date(get_the_ID(), true, 'j F Y,');
        $time       = tribe_get_start_date(get_the_ID(), true, 'G:i a');
        $venue      = tribe_get_venue(get_the_ID());
    }

?>
    <div class="item-event">
        <div class="item-event-inner">
            <div class="item-event--thumbnail">
                <img src="<?php echo $ev_img_url ?>" alt="<?php the_title() ?>" />
            </div>

            <div class="item-event--meta">
                <h3 class="item-event--name">
                    <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                </h3>

                <div class="item-event--info">
                    <?php if (!empty($day)) : ?>
                        <div class="item-event--start-time">
                            <?php echo $day ?> <span><?php echo $time ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($venue)) : ?>
                        <div class="item-event-venue"><?php echo $venue ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php }
?>