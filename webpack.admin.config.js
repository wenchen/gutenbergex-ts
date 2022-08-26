// https://github.com/WordPress/gutenberg/blob/trunk/packages/scripts/config/webpack.config.js
const wpConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require('path');

var config = wpConfig;
config.entry = `./admin/index.tsx`;
config.output.path = path.resolve(__dirname, 'public/admin/');

module.exports = config;
