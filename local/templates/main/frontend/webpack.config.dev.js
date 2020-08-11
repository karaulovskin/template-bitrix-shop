const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const HtmlWebpackHarddiskPlugin = require('html-webpack-harddisk-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const SpriteLoaderPlugin = require('svg-sprite-loader/plugin');
const fs = require('fs');

function generateHtmlPlugins(templateDir) {
    const templateFiles = fs.readdirSync(path.resolve(__dirname, templateDir));
    return templateFiles.map(item => {
        const parts = item.split('.');
        const name = parts[0];
        const extension = parts[1];
        const filePath = path.resolve(__dirname, `${templateDir}/${name}.${extension}`);
        return new HtmlWebpackPlugin({
            filename: `${name}.html`,
            template: `!!ejs-webpack-loader!${filePath}`,
            inject: true,
            alwaysWriteToDisk: true
        })
    })
}

const htmlPlugins = generateHtmlPlugins('./app/pages/');

const config = {
    mode: 'development',
    entry: './app/app.js',
    output: {
        path: path.join(__dirname, 'assets'),
        filename: 'bundle.js',
    },
    devServer: {
        contentBase: './assets',
        historyApiFallback: true,
        hot: true,
        watchContentBase: true
    },
    devtool: 'source-map',
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: "babel-loader"
                }
            },
            {
                test: /\.ejs$/,
                use: [
                    {
                        loader: "ejs-webpack-loader",
                        options: {}
                    }
                ]
            },
            {
                test: /\.css$/,
                use: [
                    'style-loader',
                    {
                        loader: 'css-loader',
                        options: {
                            importLoaders: 1,
                            url: false
                        }
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            config: {
                                path: path.resolve(__dirname, 'postcss.config.js'),
                            },
                        },
                    },
                ]
            },
            {
                test: /\.(png|jpg|gif|svg)($|\?)|\.woff($|\?)|\.woff2($|\?)|\.ttf($|\?)|\.eot($|\?)/,
                exclude: path.resolve(__dirname, 'app/icons/'),
                use: {
                    loader: 'file-loader',
                    options: {
                        name: '[path][name].[ext]'
                    }
                },
            },
            {
                test: /\.svg$/,
                loader: 'svg-sprite-loader',
                exclude: path.resolve(__dirname, 'app/fonts/'),
                options: {
                    extract: true,
                    spriteFilename: 'icons.svg',
                }
            }
        ],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: 'styles/[name].css',
        }),
        new webpack.HotModuleReplacementPlugin(),
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            "window.jQuery": "jquery"
        }),
        ...htmlPlugins,
        new HtmlWebpackHarddiskPlugin(),
        new CopyWebpackPlugin([
            {
                from: './app/fonts',
                to: './fonts'
            }
        ]),
        new CopyWebpackPlugin([
            {
                from: './app/images',
                to: './images'
            }
        ]),
        new SpriteLoaderPlugin({
            plainSprite: true
        }),
    ],
};

module.exports = config;