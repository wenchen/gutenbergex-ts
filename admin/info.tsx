import { BlockConfiguration } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

import transforms from "./src/transforms";
import edit from "./src/edit";
import save from "./src/save";

export interface Attributes {
    className: 'gutenbergex-ts-textarea'
    text: string;
}

export const info = {
    i18nDomain: 'gutenbergexts',
}

export const blockInfo: BlockConfiguration<Attributes> = {
    apiVersion: 2,
    name: 'gutenberg-ts/admin-block',
    title: __('GutenbergTS Example Block'),
    description: __('GutenbergTS Example Block'),
    icon: 'universal-access-alt',
    category: 'common',
    keywords: [__('document', info.i18nDomain), __('pdf', info.i18nDomain), __('download', info.i18nDomain)],
    attributes: {
        text: {
            type: "string",
        },
    },
    // styles: [],
    supports: {
        anchor: true,
        align: true
    },
    // variations: [],
    // transforms,
    edit,
    save
};

export default blockInfo as typeof blockInfo;