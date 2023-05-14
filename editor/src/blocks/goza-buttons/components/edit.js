import { __ } from "@wordpress/i18n";
import { RichText } from '@wordpress/block-editor';
import GozaBlockControl from './blockcontrol';
import { useEffect, Fragment } from "@wordpress/element";
import Inspector from "./inspector";

const Edit = (props) => {
    const { attributes, setAttributes, clientId, className, isSelected } = props
    const {
        id, align, url, urlOpenNewTab, title, text, bgColor, textColor, textSize,
        marginTop, marginRight, marginBottom, marginLeft,
        paddingTop, paddingRight, paddingBottom, paddingLeft,
        borderWidth, borderColor, borderRadius, borderStyle,
        hoverTextColor, hoverBgColor, hoverShadowColor, hoverShadowH, hoverShadowV, hoverShadowBlur, hoverShadowSpread,
        hoverOpacity, transitionSpeed
    } = attributes;

    useEffect(() => {
        setAttributes({ id: 'advgbbtn-' + clientId });
    }, []);

    return (
        <Fragment>
            <GozaBlockControl  {...props} />
            <Inspector  {...props} />
            <span className={`${className} align${align}`}
                style={{ display: 'inline-block' }}
            >
                <RichText
                    tagName="span"
                    placeholder={__('Add text…', 'goza')}
                    value={text}
                    onChange={(value) => setAttributes({ text: value })}
                    allowedFormats={['bold', 'italic', 'strikethrough']}
                    isSelected={isSelected}
                    className={`wp-block-goza-button_link ${id}`}
                    keepPlaceholderOnFocus
                />
            </span>
            <style>
                {`.${id} {
                        font-size: ${textSize}px;
                        color: ${textColor} !important;
                        background-color: ${bgColor} !important;
                        margin: ${marginTop}px ${marginRight}px ${marginBottom}px ${marginLeft}px;
                        padding: ${paddingTop}px ${paddingRight}px ${paddingBottom}px ${paddingLeft}px;
                        border-width: ${borderWidth}px !important;
                        border-color: ${borderColor} !important;
                        border-radius: ${borderRadius}px !important;
                        border-style: ${borderStyle} ${borderStyle !== 'none' && '!important'};
                    }
                    .${id}:hover {
                        color: ${hoverTextColor} !important;
                        background-color: ${hoverBgColor} !important;
                        box-shadow: ${hoverShadowH}px ${hoverShadowV}px ${hoverShadowBlur}px ${hoverShadowSpread}px ${hoverShadowColor};
                        transition: all ${transitionSpeed}s ease;
                        opacity: ${hoverOpacity / 100}
                    }`}
            </style>
        </Fragment>
    )
}

export default Edit;