import FKGLogoCarousel from './block'
const Save = (props) => {
	const { attributes, setAttributes } = props
	const { images } = attributes
	return (
		<FKGLogoCarousel {...props}>
			<div className='block-inner fkg-logo'>
				{images &&
					images.map((logo) => {
						return (
							<div className='fkg-logo__item' key={logo.id}>
								<div className='fkg-logo__item-image' >
									<img src={logo.url} alt={logo.alt} id={logo.id} />
								</div>
							</div>
						);
					})}
			</div>
		</FKGLogoCarousel>
	)
}

export default Save