
import { __ } from '@wordpress/i18n'
import { InspectorControls } from '@wordpress/block-editor';

import {
	PanelBody,
	RangeControl,
	ToggleControl,
	__experimentalNumberControl as NumberControl
} from '@wordpress/components';

const Inspector = (props) => {
	const { setAttributes, attributes } = props
	const { dots, infinite, speed, autoplay, autoplaySpeed, centerMode, slidesToShow, slidesToScroll } = attributes

	return (
		<InspectorControls>
			<PanelBody title="Slider Settings">
				<NumberControl
					label="slidesToShow"
					isShiftStepEnabled={true}
					onChange={(vl) => setAttributes({ slidesToShow: vl })}
					shiftStep={1}
					value={slidesToShow}
				/>
				<NumberControl
					label="slidesToScroll"
					isShiftStepEnabled={true}
					onChange={(vl) => setAttributes({ slidesToScroll: vl })}
					shiftStep={1}
					value={slidesToScroll}
				/>
				<ToggleControl
					label="Dots"
					checked={dots}
					onChange={() => setAttributes({ dots: !dots })}
				/>
				<ToggleControl
					label="Infinite"
					checked={infinite}
					onChange={() => setAttributes({ infinite: !infinite })}
				/>
				<ToggleControl
					label="centerMode"
					checked={centerMode}
					onChange={() => setAttributes({ centerMode: !centerMode })}
				/>
				<ToggleControl
					label="Autoplay"
					checked={autoplay}
					onChange={() => setAttributes({ autoplay: !autoplay })}
				/>
				<RangeControl
					label='Speed'
					value={speed}
					onChange={(vl) => setAttributes({ speed: vl })}
					min={100}
					max={1000}
					step={100}
				/>
				<RangeControl
					label='Autoplay Speed'
					value={autoplaySpeed}
					onChange={(vl) => setAttributes({ autoplaySpeed: vl })}
					min={100}
					max={5000}
					step={100}
				/>
			</PanelBody>
		</InspectorControls>
	)
}

export default Inspector