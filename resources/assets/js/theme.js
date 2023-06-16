import 'slick-carousel';
import './components/navigation';
import './components/function';

import AOS from 'aos';
import 'aos/dist/aos.css'; 
AOS.init({
    duration: 1200,
    once: true,
    disable: 'mobile', 
});


$(document).ready(function() {
    AOS.refresh();
});

import './blocks/team-carousel';
import './blocks/events-carousel';
import './blocks/testimonials';
import './blocks/posts-slider';
import './blocks/events-listing';
import './blocks/gives-slider';
import './blocks/video-popup-actions';
import './blocks/ss-upcoming-event-video';
import './blocks/ss-text-tsm-video';
import './blocks/logo-carousel';
import './blocks/projects-grid-action';
import './blocks/counter-box';