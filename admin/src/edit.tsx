import React from 'react';

import { RichText } from "@wordpress/block-editor";
import { useBlockProps } from '@wordpress/block-editor';
 
const Edit = ({ attributes, setAttributes }) => {
    const blockProps = useBlockProps( {
        className: attributes.className
    } );

    const onChangeContent = ( text ) => {
        setAttributes( { text } );
    }

    return (
        <div { ...blockProps }>
            <RichText tagName="p" value={attributes.text} onChange={onChangeContent} />
        </div>
    );
}

export default Edit;