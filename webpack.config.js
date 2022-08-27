// https://github.com/WordPress/gutenberg/blob/trunk/packages/scripts/config/webpack.config.js
const wpConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

var config = wpConfig;
config.entry = `./admin/index.tsx`;
config.output.path = path.resolve(__dirname, 'public/admin/');
config.watchOptions = {
    aggregateTimeout: 200,
    poll: 1000,
};

module.exports = [
    config,
    {
        ...wpConfig,
        entry: `./client/main.ts`,
        module: {
            rules: [
                {
                    test: /\.tsx?$/,
                    use: [
                        {
                            loader: 'ts-loader',
                            options: {
                                configFile: 'tsconfig.client.json',
                                transpileOnly: true,
                            },
                        },
                    ],
                },
                {
                    test: /\.s[ac]ss$/i,
                    use: [
                      MiniCssExtractPlugin.loader,
                      "css-loader",
                      {
                        loader: "sass-loader",
                        options: {
                          sourceMap: true,
                          sassOptions: {
                            outputStyle: "compressed",
                          },
                        },
                      },
                    ],
                },
            ],
        },
        resolve: {
            extensions: [ '.ts', '.tsx', '.js', '.jsx'],
        },
        plugins: [
            new MiniCssExtractPlugin({
                filename: "main.css",
            }),
        ],
        output: {
            filename: 'main.js',
            path: path.resolve(__dirname, 'public/client/'),
        },
        watchOptions: {
            aggregateTimeout: 200,
            poll: 1000,
        },
    }
];
