import React from 'react';

import { useBlockProps } from '@wordpress/block-editor';
import { Attributes } from '../info';

const Save = ({ attributes }: Attributes) => {
    const blockProps = useBlockProps.save();

    return (
        <div { ...blockProps }>
            { attributes.text }
        </div>
    )
}

export default Save;