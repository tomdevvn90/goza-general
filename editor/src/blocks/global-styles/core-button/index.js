//add style button
import './style.scss';
import './editor.scss';

wp.domReady(() => {
    wp.blocks.registerBlockStyle('core/button', {
        name: 'btn-goza-general',
        label: 'General',
    });

    wp.blocks.registerBlockStyle('core/button', {
        name: 'btn-goza-water',
        label: 'Water',
    });

    wp.blocks.registerBlockStyle('core/button', {
        name: 'btn-goza-charity',
        label: 'Charity',
    });

    wp.blocks.registerBlockStyle('core/button', {
        name: 'btn-goza-ngo-dark',
        label: 'Ngo Dark',
    });

    wp.blocks.registerBlockStyle('core/button', {
        name: 'btn-goza-water-charity',
        label: 'Water Charity',
    });

    wp.blocks.registerBlockStyle('core/button', {
        name: 'btn-goza-charity-organization',
        label: 'Charity Organization',
    });
});