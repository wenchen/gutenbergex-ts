import React from "react";
import { BlockSaveProps } from "@wordpress/blocks";
import { Attributes } from '../info';
import { useBlockProps } from '@wordpress/block-editor';

class Save extends React.Component<BlockSaveProps<Attributes>> {
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
        const blockProps = useBlockProps.save();
 
        return (
            <div className="text">
                { this.props.attributes.text }
            </div>
        )
    }
}

export default Save;