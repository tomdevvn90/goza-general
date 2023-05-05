<?php 
// create id attribute for specific styling
$id = 'be-ss-hero-'.$block['id'];
// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

$location = get_field('location_google_map_block');
$zoom = get_field('zoom_google_map_block');

$height = get_field('height_google_map_block')? : 500;

$url = 'https://maps.google.com/maps?q=%1$s&amp;t=m&amp;z=%2$d&amp;output=embed&amp;iwloc=near';
$params = [
    rawurlencode( $location ),
    absint( $zoom ),
];

?>
<section id="<?php echo $id; ?>" class="be-google-map <?php echo $align_class; ?>">
    <div class="be-google-map--content">
        <div class="be-google-map-box">
            <iframe height="<?php echo $height; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowfullscreen
                    src="<?php echo esc_url( vsprintf( $url, $params ) ); ?>"
                    title="<?php echo esc_attr( $location ); ?>"
                    aria-label="<?php echo esc_attr( $location ); ?>"
            ></iframe>
        </div>
    </div>
</section>


