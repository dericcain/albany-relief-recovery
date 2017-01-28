let path = require('path');
let CommonsPlugin = new require("webpack/lib/optimize/CommonsChunkPlugin");
let dir = './resources/assets/js/';

// Define all of our entrypoints here
let entryPoints = {
    'app': dir + 'app',
    'needs': dir + 'needs',
    'needs-table': dir + 'needs-table',
    'map': dir + 'map',
    'users': dir + 'users'
};

module.exports = {
    entry: entryPoints,
    devtool: 'source-map',
    output: {
        path: path.join(__dirname, 'public/js'),
        filename: '[name].bundle.js'
    },
    loaders: [
        {
            test: /\.js$/,
            exclude: 'node_modules',
            loader: 'babel',
            include: __dirname
        }
    ],
    plugins: [
        new CommonsPlugin({
            minChunks: 3,
            name: 'common'
        }),
    ]
};
