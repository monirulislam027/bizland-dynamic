const path = require('path')
const MiniCssExtract  = require('mini-css-extract-plugin');
const webpack = require('webpack')

module.exports = {
    mode: "development",
    entry:{
        app:'./assets/admin/app.js',
    },
    output: {
        path: path.resolve(__dirname, 'assets/admin/dist'),
        filename: "[name].js"
    },
    module: {
        rules: [
            {
                test: /\.css$/,
                use: [MiniCssExtract.loader , 'css-loader']
            }
        ]
    },
    plugins: [

        new MiniCssExtract({
            //....
        }),
        new webpack.ProvidePlugin({
            jQuery: 'jquery',
            $: 'jquery',
            jquery: 'jquery',
            "window.jQuery": 'jquery',
            "$": 'jquery',
            "window.$": 'jquery',
        })
    ]
};