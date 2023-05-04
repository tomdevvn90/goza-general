/**
 * Logo Carousel Wrap
 */

const GozaLogoCarousel = (props) => {
	// Setup the attributes
	const { attributes, setAttributes, className } = props;
	const { dots, infinite, speed, centerMode, autoplay, autoplaySpeed, slidesToShow, slidesToScroll } = attributes
	let dataSlider = {
		slidesToShow: slidesToShow, 
		slidesToScroll: slidesToScroll, 
		dots: dots,
		infinite: infinite,
		speed: speed,
		centerMode: centerMode,
		autoplay: autoplay,
		autoplaySpeed: autoplaySpeed
	}
	return (
		<div className={['goza-logo-carousel-block', className].join(' ')} data-slider={JSON.stringify(dataSlider)}>
			{props.children}
		</div>
	)
}

export default GozaLogoCarousel;