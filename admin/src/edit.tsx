import React from "react";
import { BlockEditProps } from "@wordpress/blocks";
import { Attributes } from '../info';
import { useBlockProps } from '@wordpress/block-editor';

import { RichText } from "@wordpress/block-editor";

const blockStyle = {
	backgroundColor: '#900',
	color: '#fff',
	padding: '20px',
};

class Edit extends React.Component<BlockEditProps<Attributes>> {
    constructor(props: BlockEditProps<Attributes>) {
        super(props);
    }

    componentDidMount() {
        console.log(`Edit componentDidMount`);
    }
    
    componentDidUpdate() {
        console.log(`Edit componentDidUpdate`);
        console.log(`Props Text: ${this.props.attributes.text}`);
    }

    componentWillUnmount() {
        console.log(`Edit componentWillUnmount`);
    }
    
    handleStatusChange(status) {
        console.log(`Edit handleStatusChange: ${status}`);
    }

    render(): React.ReactNode {
        const onChangeContent = ( text ) => {
            this.props.setAttributes( { text } );
            console.log(`onChangeContent get: ${text}`);
        }
        return (
            <div className="text">
                <RichText tagName="p" value={this.props.attributes.text} onChange={onChangeContent} />
            </div>
        );
    }
}

export default Edit;