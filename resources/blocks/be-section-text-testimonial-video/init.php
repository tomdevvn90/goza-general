<?php 

function load_testimonial(){
    $testimonial = get_field('item_testimonials_ss_text_tsm_vd') ?: '';
    ?>
    <div class="be-ss-text-tsm-video--testimonial"> 
        <div class="be-ss-text-tsm-video--testimonial-slider" data-silder> 
            <?php foreach ($testimonial as $key => $value): ?>
                <div class="item-testimonial"> 
                    <?php if(!empty($value['heading'])): ?>
                        <p class="item-testimonial--heading"> <?= $value['heading'] ?> </p>
                    <?php endif; ?>   

                    <?php if(!empty($value['quocte'])): ?>
                        <blockquote> <?= $value['quocte'] ?> </blockquote>
                    <?php endif; ?>    
                </div>
            <?php endforeach; ?>    
        </div>
    </div>
<?php }


function load_video($id){
    $video  = get_field('vd_ss_text_tsm_vd') ?: ''; 
    $bg     = $video['bg'] ?: '';
    $url_vd = $video['url'];
    ?>
    <div class="be-ss-text-tsm-video--video"> 
        <div class="be-ss-text-tsm-video--video-bg"> 
            <?php if(!empty($bg)): ?>
                <img src="<?= esc_url($bg) ?>" alt="image">
            <?php endif; ?>    
        </div>

        <div class="be-ss-text-tsm-video--video-cta"> 
                

                <div id="be-popup-video-<?php echo $id?>" class=" be-popup-video"> 
                  <a data-src="<?php echo esc_url($url_vd) ?>" data-lg-size="1280-720">
                     <span class="__icon-play"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 163.861 163.861" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M34.857 3.613C20.084-4.861 8.107 2.081 8.107 19.106v125.637c0 17.042 11.977 23.975 26.75 15.509L144.67 97.275c14.778-8.477 14.778-22.211 0-30.686L34.857 3.613z" fill="#000000" data-original="#000000" class=""></path></g></svg></span>
                  </a>
               </div>


        </div>
    </div>
<?php 
}