
import { __ } from "@wordpress/i18n";
import { registerBlockType } from "@wordpress/blocks";
import Edit from "./components/edit";
import Save from "./components/save";

const buttonBlockIcon = (
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="2 2 22 22">
        <path fill="none" d="M0 0h24v24H0V0z" />
        <path d="M19 7H5c-1.1 0-2 .9-2 2v6c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2zm0 8H5V9h14v6z" />
    </svg>
);
const blockAttrs = {
    id: {
        type: 'string',
    },
    url: {
        type: 'string',
    },
    urlOpenNewTab: {
        type: 'boolean',
        default: true,
    },
    title: {
        type: 'string',
    },
    text: {
        source: 'children',
        selector: 'a',
        default: 'PUSH THE BUTTON',
    },
    bgColor: {
        type: 'string',
    },
    textColor: {
        type: 'string',
    },
    textSize: {
        type: 'number',
        default: 18,
    },
    marginTop: {
        type: 'number',
        default: 0,
    },
    marginRight: {
        type: 'number',
        default: 0,
    },
    marginBottom: {
        type: 'number',
        default: 0,
    },
    marginLeft: {
        type: 'number',
        default: 0,
    },
    paddingTop: {
        type: 'number',
        default: 10,
    },
    paddingRight: {
        type: 'number',
        default: 30,
    },
    paddingBottom: {
        type: 'number',
        default: 10,
    },
    paddingLeft: {
        type: 'number',
        default: 30,
    },
    borderWidth: {
        type: 'number',
        default: 1,
    },
    borderColor: {
        type: 'string',
    },
    borderStyle: {
        type: 'string',
        default: 'none',
    },
    borderRadius: {
        type: 'number',
        default: 50
    },
    hoverTextColor: {
        type: 'string',
    },
    hoverBgColor: {
        type: 'string',
    },
    hoverShadowColor: {
        type: 'string',
        default: '#ccc'
    },
    hoverShadowH: {
        type: 'number',
        default: 1,
    },
    hoverShadowV: {
        type: 'number',
        default: 1,
    },
    hoverShadowBlur: {
        type: 'number',
        default: 12,
    },
    hoverShadowSpread: {
        type: 'number',
        default: 0,
    },
    hoverOpacity: {
        type: 'number',
        default: 100,
    },
    transitionSpeed: {
        type: 'number',
        default: 200,
    },
    align: {
        type: 'string',
        default: 'none',
    },
    changed: {
        type: 'boolean',
        default: false,
    }
};

registerBlockType('goza-blocks/goza-button', {
    title: __('Advanced Button', 'goza'),
    description: __('New button with more styles.', 'goza'),
    icon: {
        src: buttonBlockIcon,
    },
    category: 'goza-theme',
    keywords: [__('button', 'goza'), __('link', 'goza')],
    attributes: blockAttrs,
    styles: [
        { name: 'default', label: __('Default', 'goza'), isDefault: true },
        { name: 'outlined', label: __('Outlined', 'goza') },
        { name: 'squared', label: __('Squared', 'goza') },
        { name: 'squared-outline', label: __('Squared Outline', 'goza') },
    ],
    supports: {
        anchor: true,
    },
    /* Render the block in the editor. */
	edit: (props) => {
		return <Edit {...props} />;
	},
	/* Save the block markup. */
	save: (props) => {
		return <Save {...props} />;
	}
});
