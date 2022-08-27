import React from 'react';

import { Component } from '@wordpress/element';
import { BlockSaveProps } from "@wordpress/blocks";
import { Attributes } from '../info';

class Save extends Component<BlockSaveProps<Attributes>> {
    constructor(props: BlockSaveProps<Attributes>) {
        super(props);
    }

    componentDidMount() {
        console.log(`Save componentDidMount`);
    }
    
    componentDidUpdate() {
        console.log(`Save componentDidUpdate`);
    }

    componentWillUnmount() {
        console.log(`Save componentWillUnmount`);
    }
    
    handleStatusChange(status) {
        console.log(`Save handleStatusChange: ${status}`);
    }

    render(): React.ReactNode {
        return (
            <div>
                { this.props.attributes.text }
            </div>
        )
    }
}

export default Save;