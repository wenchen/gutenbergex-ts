import React from 'react';

import { Component } from '@wordpress/element';
import { BlockSaveProps } from "@wordpress/blocks";
import { Attributes } from '../info';

class Save extends Component<BlockSaveProps<Attributes>> {
    constructor(props: BlockSaveProps<Attributes>) {
        super(props);
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