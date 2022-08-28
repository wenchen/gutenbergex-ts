import React from 'react';

import { Component } from '@wordpress/element';
import { BlockEditProps } from "@wordpress/blocks";
import { RichText } from "@wordpress/block-editor";

import { Attributes } from '../info';
import { EditBlockPropContext } from '../context';

class Edit extends Component<BlockEditProps<Attributes>> {
    static contextType = EditBlockPropContext;

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
        }
        return (
            <div {...this.context}>
                <RichText tagName="p" value={this.props.attributes.text} onChange={onChangeContent} />
            </div>
        );
    }
}

export default Edit;