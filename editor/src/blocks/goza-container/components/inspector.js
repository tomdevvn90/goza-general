/**
 * Inspector Controls
 */

/**
 * Internal dependencies.
 */

// Setup the block
const { __ } = wp.i18n;
const { Component } = wp.element;

// Import block components
import {
	InspectorControls,
	MediaUpload,
	__experimentalColorGradientControl as ColorGradientControl
} from '@wordpress/block-editor';

// Import Inspector components
import {
	Button,
	Icon,
	PanelBody,
	RangeControl,
	ToggleControl,
	opacityBg,
	TextControl,
	FocalPointPicker
} from '@wordpress/components';

/**
 * Create an Inspector Controls wrapper Component
 */

const videoHostIcon = (
	<svg height="25" id="Layer_1" version="1.1" viewBox="0 0 24 24" width="25" xmlns="http://www.w3.org/2000/svg">
		<path clipRule="evenodd" d="M22.506,21v0.016L17,15.511V19c0,1.105-0.896,2-2,2h-1.5H3H2c-1.104,0-2-0.895-2-2  v-1l0,0V6l0,0V5c0-1.104,0.896-1.999,2-1.999h1l0,0h10.5l0,0H15c1.104,0,2,0.895,2,1.999v3.516l5.5-5.5V3.001  c0.828,0,1.5,0.671,1.5,1.499v15C24,20.327,23.331,20.996,22.506,21z" fillRule="evenodd" />
	</svg>
);
export default class Inspector extends Component {
	constructor(props) {
		super(...arguments);
	}

	render() {
		// Setup the attributes
		const {
			containerPaddingTop,
			containerPaddingBottom,
			containerMaxWidth,
			focalPoint,
			containerBackgroundColor,
			containerBgGradientColor,
			containerImgURL,
			containerImgID,
			videoURL,
			videoTitle,
			videoID
		} = this.props.attributes;
		const { setAttributes } = this.props;

		const onSelectImage = (img) => {
			setAttributes({
				containerImgID: img.id,
				containerImgURL: img.url,
				containerImgAlt: img.alt,
			});
		};

		const onRemoveImage = () => {
			setAttributes({
				containerImgID: null,
				containerImgURL: null,
				containerImgAlt: null,
			});
		};

		const onChangeSize = (position, value, screen) => {
			if (position === 'top') {
				let newSize = { ...containerPaddingTop }
				newSize[screen] = value
				if (screen == 'default' && containerPaddingTop.sync == true) {
					newSize.tablet = value
					newSize.mobile = value
				}

				setAttributes({ containerPaddingTop: newSize })
			} else {
				let newSize = { ...containerPaddingBottom }
				newSize[screen] = value
				if (screen == 'default' && containerPaddingBottom.sync == true) {
					newSize.tablet = value
					newSize.mobile = value
				}

				setAttributes({ containerPaddingBottom: newSize })
			}
		}

		const onChangeSizeResponsiveTop = (value) => {
			let newSize = { ...containerPaddingTop }
			newSize.sync = value
			setAttributes({ containerPaddingTop: newSize })
		}

		const onChangeSizeResponsiveBottom = (value) => {
			let newSize = { ...containerPaddingBottom }
			newSize.sync = value
			setAttributes({ containerPaddingBottom: newSize })
		}

		const loadLocalVideo = (video) => {
			setAttributes(
				{
					videoURL: video.url,
					videoID: video.id,
					videoTitle: video.title,
				}
			);
			document.querySelector('video').load();
		}


		return (
			<InspectorControls key="inspector">
				<PanelBody
					title={__('Container Options', 'goza-blocks')}
					initialOpen={true}
				>
					<TextControl
						label={__('Padding Top')}
						value={containerPaddingTop.default}
						onChange={(value) => {
							onChangeSize('top', value, 'default')
						}}
					/>

					<ToggleControl
						label={__('Sync Padding Top')}
						help={__('Disable to custom padding top for each screen (Desktop, Tablet, Mobile)')}
						checked={containerPaddingTop.sync}
						onChange={onChangeSizeResponsiveTop}
					/>

					{!containerPaddingTop.sync &&
						<div>
							<TextControl
								label={__('on Tablet (≦992px)')}
								help={__('Set padding top for tablet')}
								value={containerPaddingTop.tablet}
								onChange={(value) => {
									onChangeSize('top', value, 'tablet')
								}}
							/>
							<TextControl
								label={__('on Mobile (≦767px)')}
								help={__('Set padding top for mobile')}
								value={containerPaddingTop.mobile}
								onChange={(value) => {
									onChangeSize('top', value, 'mobile')
								}}
							/>
						</div>
					}
					<hr />

					<TextControl
						label={__('Padding Bottom')}
						value={containerPaddingBottom.default}
						onChange={(value) => {
							onChangeSize('bottom', value, 'default')
						}}
					/>

					<ToggleControl
						label={__('Sync Padding Bottom')}
						help={__('Disable to custom padding bottom for each screen (Desktop, Tablet, Mobile)')}
						checked={containerPaddingBottom.sync}
						onChange={onChangeSizeResponsiveBottom}
					/>

					{!containerPaddingBottom.sync &&
						<div>
							<TextControl
								label={__('on Tablet (≦992px)')}
								help={__('Set padding bottom for tablet')}
								value={containerPaddingBottom.tablet}
								onChange={(value) => {
									onChangeSize('bottom', value, 'tablet')
								}}
							/>
							<TextControl
								label={__('on Mobile (≦767px)')}
								help={__('Set padding bottom for mobile')}
								value={containerPaddingBottom.mobile}
								onChange={(value) => {
									onChangeSize('bottom', value, 'mobile')
								}}
							/>
						</div>
					}
					<hr />

					<RangeControl
						label={__(
							'Inside Container Max Width (px)',
							'goza-blocks'
						)}
						value={containerMaxWidth}
						onChange={(value) =>
							this.props.setAttributes({
								containerMaxWidth: value,
							})
						}
						min={500}
						max={1600}
						step={1}
					/>
				</PanelBody>
				<PanelBody title='Background Video'>
					<MediaUpload
						allowedTypes={["video"]}
						value={videoID}
						onSelect={(video) => loadLocalVideo(video)}
						render={({ open }) => (
							<Button
								className="button button-large is-primary"
								onClick={open}
								style={{ marginLeft: '5px' }}
							>
								Choose video
							</Button>
						)}
					/>
					<div style={{ display: 'flex', alignItems: 'center', marginTop: '10px' }}>
						<span style={{ width: '25px', height: '25px', margin: '-1px 5px 0', }}> {videoHostIcon} </span>
						<span id="title-video">{videoTitle || 'Not selected yet.'}</span>
					</div>
				</PanelBody>
				<PanelBody
					title={__('Background Image', 'goza-blocks')}
					initialOpen={false}
				>
					<p>
						{__(
							'Select a background image:',
							'goza-blocks'
						)}
					</p>
					<MediaUpload
						onSelect={onSelectImage}
						type="image"
						value={containerImgID}
						render={({ open }) => (
							<div>
								<Button
									className="goza-container-inspector-media"
									label={__(
										'Edit image',
										'goza-blocks'
									)}
									onClick={open}
								>
									<Icon icon="format-image" />
									{__(
										'Select Image',
										'goza-blocks'
									)}
								</Button>

								{containerImgURL &&
									!!containerImgURL.length && (
										<Button
											className="goza-container-inspector-media"
											label={__(
												'Remove Image',
												'goza-blocks'
											)}
											onClick={onRemoveImage}
										>
											<Icon icon="dismiss" />
											{__(
												'Remove',
												'goza-blocks'
											)}
										</Button>
									)}
							</div>
						)}
					></MediaUpload>
				</PanelBody>
				{containerImgURL && !!containerImgURL.length && (
					<PanelBody title='Background Position'>
						<FocalPointPicker
							label='Focal Point Picker'
							url={containerImgURL}
							value={focalPoint}
							onChange={(value) => setAttributes({ focalPoint: value })}
						/>
					</PanelBody>
				)}
				<PanelBody title={__('Background Color', 'goza-blocks')}
					initialOpen={false}>
					<RangeControl
						label={__('Opacity', 'goza-blocks')}
						value={opacityBg}
						onChange={(value) =>
							this.props.setAttributes({
								opacityBg: value,
							})
						}
						min={0}
						max={1}
						step={0.1}
					/>
					<ColorGradientControl
						colorValue={containerBackgroundColor}
						gradientValue={containerBgGradientColor}
						gradients={[
							{
								name: 'gradient-primary',
								gradient:
									'linear-gradient(180deg, rgba(9, 7, 24, 0.5) 0%, rgba(17, 18, 34, 0.5) 100%), #111222',
								slug: 'gradient-primary',
							},
							{
								name: 'gradient-secondary',
								gradient:
									'linear-gradient(180deg, rgba(9, 7, 24, 0.5) 0%, rgba(17, 18, 34, 0.5) 100%), #242538',
								slug: 'gradient-secondary',
							}
						]}
						label={__("Choose a color or a gradient")}
						onColorChange={(vl) => setAttributes({ containerBackgroundColor: vl })}
						onGradientChange={(vl) => setAttributes({ containerBgGradientColor: vl })}
					/>
				</PanelBody>
			</InspectorControls>
		);
	}
}
