/**
 * BLOCK: Logo Carousel
 */

import "./styles/style.scss";
import "./styles/editor.scss";
import { __ } from "@wordpress/i18n";
import { registerBlockType } from "@wordpress/blocks";

//styles
import Edit from "./components/edit";
import Save from "./components/save";

const attr = {
	align: {
        type: 'string',
        default: 'full'
    },
	images: {
		"type": "array"
	},
	slidesToShow: {
		type: 'number',
		default: 5
	},
	slidesToScroll: {
		type: 'number',
		default: 1
	},
	dots: {
		type: 'boolean',
		default: true
	},
	infinite: {
		type: 'boolean',
		default: true
	},
	speed: {
		type: 'number',
		default: 700
	},
	centerMode: {
		type: 'boolean',
		default: true
	},
	autoplay: {
		type: 'boolean',
		default: true
	},
	autoplaySpeed: {
		type: 'number',
		default: 3000
	},
};

export default registerBlockType("goza-blocks/goza-logo-carousel", {
	title: __("Goza Logo Carousel"),
	icon: "slides",
	category: "goza-blocks",
	keywords: [__("logo"), __("carousel"), __("goza"), __("slider")],
	attributes: attr,
	supports: {
		// Declare support for specific alignment options.
		align: ['full' ]
	},
	/* Render the block in the editor. */
	edit: (props) => {
		return <Edit {...props} />;
	},
	/* Save the block markup. */
	save: (props) => {
		return <Save {...props} />;
	},
});
