import { RichText } from '@wordpress/block-editor';
import { Fragment  } from "@wordpress/element";

const Save = (props) => {
    const { attributes, className } = props
    const {
        id,
        align,
        url,
        urlOpenNewTab,
        title,
        text,
    } = attributes;

    return (
        <Fragment>
            <div className={`${className} align${align}`}>
                <RichText.Content
                    tagName="a"
                    className={`wp-block-goza-button_link ${id}`}
                    href={url || '#'}
                    title={title}
                    target={!urlOpenNewTab ? '_self' : '_blank'}
                    value={text}
                    rel="noopener noreferrer"
                />
            </div>
        </Fragment>
    )
}

export default Save;