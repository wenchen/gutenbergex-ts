import { registerBlockType } from '@wordpress/blocks';
import { blockInfo } from './info';
import './style/main.scss';

registerBlockType(blockInfo.name, blockInfo);
