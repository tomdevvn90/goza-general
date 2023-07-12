<?php

function tribe_event_happening_list(){
    global $post;

    $format = 'Y-m-d';
    $args_event = array(
        'post_type'   => 'tribe_events',
        'posts_per_page' => tribe_get_option( 'postsPerPage', 10 ),
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => '_EventStartDate',
                'value' => date( $format ),
                'compare' => '<='
            ),
            array(
                'key' => '_EventEndDate',
                'value' => date( $format ),
                'compare' => '>='
            )
        ),
    );

    $events = new WP_Query( $args_event );
   
    echo '<div class="event-list">';

    while ( $events->have_posts() ) {
        $events->the_post();

        $event_thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        $event_thumb_bg = !empty($event_thumb_url)? 
            'background: url('.$event_thumb_url.') no-repeat center center / cover, #fafafa;' : '';
        
        $start_day   = tribe_get_start_date(get_the_ID(), true, 'd');
        $start_month = tribe_get_start_date(get_the_ID(), true, 'F');
        $time_start  = tribe_get_start_date(get_the_ID(), true, 'G:i a');
        $time_end    = tribe_get_end_date(get_the_ID(), true, 'G:i a');
        $venue       = tribe_get_venue(get_the_ID());

        ?>
        <div <?php post_class( 'item-event', get_the_ID() ); ?> >
            <div class="item-event--inner">
                <div class="item-event--bg"></div>              
                <div class="item-event--featured-image-wrap">
                    <div class="event-thumbnail" style="<?php echo $event_thumb_bg; ?>">
                        <div class="event-thumbnail-overlay"></div>
                    </div>
                </div>
                <div class="item-event--content">
                    <div class="item-event--event-date">
                        <?php if( !empty($start_day) && !empty($start_month) ): ?>
                            <div class="event-month-day">
                                <span><?php echo $start_day; ?></span>
                                <?php echo $start_month; ?>
                            </div>
                        <?php endif; ?>
                        <?php if( !empty($start_day) && !empty($start_month) ): ?>
                            <div class="event-time">
                                <?php echo $time_start ?> 
                                -
                                <?php echo $time_end ?> 
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="item-event--content-entry">
                        <a href="<?php echo get_permalink( get_the_ID() ); ?>" class="title-link" title="">
                            <?php echo get_the_title(); ?>
                        </a>
                        <?php if( !empty($venue) ): ?>
                            <div class="venue-empty"><?php echo $venue; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <a href="<?php echo get_permalink( get_the_ID() ); ?>" class="readmore-link">
                    <?php esc_html_e('View Details', 'goza'); ?>
                </a>
            </div>
        </div>
        <?php

    }

    echo '</div>';

    wp_reset_postdata(  );

    tribe_event_pagination_func($events);

}
function tribe_event_upcoming_list(){
    global $post;

    $format = 'Y-m-d';
    $args_event = array(
        'post_type'   => 'tribe_events',
        'posts_per_page' => tribe_get_option( 'postsPerPage', 10 ),
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => '_EventStartDate',
                'value' => date( $format ),
                'compare' => '>'
            ),
        ),
    );

    $events = new WP_Query( $args_event );

    echo '<div class="event-list">';

    while ( $events->have_posts() ) {
        $events->the_post();

        $event_thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        $event_thumb_bg = !empty($event_thumb_url)? 
            'background: url('.$event_thumb_url.') no-repeat center center / cover, #fafafa;' : '';
        
        $start_day   = tribe_get_start_date(get_the_ID(), true, 'd');
        $start_month = tribe_get_start_date(get_the_ID(), true, 'F');
        $time_start  = tribe_get_start_date(get_the_ID(), true, 'G:i a');
        $time_end    = tribe_get_end_date(get_the_ID(), true, 'G:i a');
        $venue       = tribe_get_venue(get_the_ID());

        ?>
        <div <?php post_class( 'item-event', get_the_ID() ); ?> >
            <div class="item-event--inner">
                <div class="item-event--bg"></div>              
                <div class="item-event--featured-image-wrap">
                    <div class="event-thumbnail" style="<?php echo $event_thumb_bg; ?>">
                        <div class="event-thumbnail-overlay"></div>
                    </div>
                </div>
                <div class="item-event--content">
                    <div class="item-event--event-date">
                        <?php if( !empty($start_day) && !empty($start_month) ): ?>
                            <div class="event-month-day">
                                <span><?php echo $start_day; ?></span>
                                <?php echo $start_month; ?>
                            </div>
                        <?php endif; ?>
                        <?php if( !empty($start_day) && !empty($start_month) ): ?>
                            <div class="event-time">
                                <?php echo $time_start ?> 
                                -
                                <?php echo $time_end ?> 
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="item-event--content-entry">
                        <a href="<?php echo get_permalink( get_the_ID() ); ?>" class="title-link" title="">
                            <?php echo get_the_title(); ?>
                        </a>
                        <?php if( !empty($venue) ): ?>
                            <div class="venue-empty"><?php echo $venue; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <a href="<?php echo get_permalink( get_the_ID() ); ?>" class="readmore-link">
                    <?php esc_html_e('View Details', 'goza'); ?>
                </a>
            </div>
        </div>
        <?php

    }

    echo '</div>';

    wp_reset_postdata(  );

    tribe_event_pagination_func($events);
}
function tribe_event_expired_list(){
    global $post;

    $past_events = array();
    $get_past_events = tribe_get_events( [
        'end_date' => 'now',
    ], false );

    if ( $get_past_events ) {
        foreach ( $get_past_events as $past_event ) {
            $past_events[] = $past_event->ID;
        }
    }

    $format = 'Y-m-d';
    $args_event = array(
        'post_type'   => 'tribe_events',
        'posts_per_page' => tribe_get_option( 'postsPerPage', 10 ),
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => '_EventEndDate',
                'value' => date( $format ),
                'compare' => '<'
            ),
        ),
    );

    $events = new WP_Query( $args_event );

    echo '<div class="event-list">';

    while ( $events->have_posts() ) {
        $events->the_post();

        $event_thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        $event_thumb_bg = !empty($event_thumb_url)? 
            'background: url('.$event_thumb_url.') no-repeat center center / cover, #fafafa;' : '';
        
        $start_day   = tribe_get_start_date(get_the_ID(), true, 'd');
        $start_month = tribe_get_start_date(get_the_ID(), true, 'F');
        $time_start  = tribe_get_start_date(get_the_ID(), true, 'G:i a');
        $time_end    = tribe_get_end_date(get_the_ID(), true, 'G:i a');
        $venue       = tribe_get_venue(get_the_ID());

        ?>
        <div <?php post_class( 'item-event', get_the_ID() ); ?> >
            <div class="item-event--inner">
                <div class="item-event--bg"></div>              
                <div class="item-event--featured-image-wrap">
                    <div class="event-thumbnail" style="<?php echo $event_thumb_bg; ?>">
                        <div class="event-thumbnail-overlay"></div>
                    </div>
                </div>
                <div class="item-event--content">
                    <div class="item-event--event-date">
                        <?php if( !empty($start_day) && !empty($start_month) ): ?>
                            <div class="event-month-day">
                                <span><?php echo $start_day; ?></span>
                                <?php echo $start_month; ?>
                            </div>
                        <?php endif; ?>
                        <?php if( !empty($start_day) && !empty($start_month) ): ?>
                            <div class="event-time">
                                <?php echo $time_start ?> 
                                -
                                <?php echo $time_end ?> 
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="item-event--content-entry">
                        <a href="<?php echo get_permalink( get_the_ID() ); ?>" class="title-link" title="">
                            <?php echo get_the_title(); ?>
                        </a>
                        <?php if( !empty($venue) ): ?>
                            <div class="venue-empty"><?php echo $venue; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <a href="<?php echo get_permalink( get_the_ID() ); ?>" class="readmore-link">
                    <?php esc_html_e('View Details', 'goza'); ?>
                </a>
            </div>
        </div>
        <?php

    }

    echo '</div>';

    wp_reset_postdata(  );

    tribe_event_pagination_func($events);
}

function tribe_event_pagination_func( $query ){

    $big = 999999999; // need an unlikely integer
    $args = array(
        'base' => '%_%',
        'format' => '/?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $query->max_num_pages
    );

    if( $query->max_num_pages > 1){
        echo '<div class="pagination event-pagination">';
            echo paginate_links( $args );
        echo '</div>';
    }

}
