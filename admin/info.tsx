import { BlockConfiguration } from '@wordpress/blocks';

import transforms from "./src/transforms";
import edit from "./src/edit";
import save from "./src/save";

export interface Attributes {
    text: string;
}

export const blockInfo: BlockConfiguration<Attributes> = {
	apiVersion: 2,
	name: 'gutenberg-ts/admin-block',
	title: 'GutenbergTS Example Block',
    description: 'GutenbergTS Example Block',
	icon: 'shield',
	category: 'common',
    keywords: ['document', 'pdf', 'download'],
    attributes: {
		text: {
			type: "string",
			source: "html",
			selector: '.text',
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