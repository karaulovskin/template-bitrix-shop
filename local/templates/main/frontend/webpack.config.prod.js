const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const SpriteLoaderPlugin = require('svg-sprite-loader/plugin');
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const MinifyPlugin = require("babel-minify-webpack-plugin");
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const ImageminWebpWebpackPlugin = require("imagemin-webp-webpack-plugin");
const fs = require('fs');
const webp = require("imagemin-webp");

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
        })
    })
}

const htmlPlugins = generateHtmlPlugins('./app/pages/');

const config = {
    mode: 'production',
    entry: './app/app.js',
    output: {
        path: path.join(__dirname, 'assets'),
        filename: 'bundle.js',
    },
    stats: {
        assets: false,
        children: false,
        warnings: false,
        usedExports: true
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                use: {
                    loader: "babel-loader",
                    options: {
                        presets: ["@babel/preset-env"]
                    }
                }
            },
            {
                test: require.resolve("svg4everybody"),
                use: "imports-loader?this=>window"
            },
            {
                test: /\.ejs$/,
                use: [
                    {
                        loader: "ejs-compiled-loader",
                        options: {}
                    }
                ]
            },
            {
                test: /\.css$/,
                use: [
                    MiniCssExtractPlugin.loader,
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
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            "window.jQuery": "jquery"
        }),
        ...htmlPlugins,
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
        new ImageminPlugin({
            test: /\.(jpe?g|png|gif)$/i,
            optipng: {
                optimizationLevel: 4
            },
            jpegtran: {
                progressive: true
            },
            plugins: [
                // webp({ quality: 75})
            ],
        }),
        new ImageminWebpWebpackPlugin({
            test: /\.(jpe?g|png|gif)$/i,
            overrideExtension: false
        }),
        new SpriteLoaderPlugin({
            plainSprite: true
        }),
        // new BundleAnalyzerPlugin()
    ],
    optimization: {
        minimizer: [
            new MinifyPlugin(),
            new OptimizeCSSAssetsPlugin({})
        ]
    }
};

module.exports = config;