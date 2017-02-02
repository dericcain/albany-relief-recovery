let path = require('path');
let CommonsPlugin = new require("webpack/lib/optimize/CommonsChunkPlugin");
let dir = './resources/assets/js/';

// Define all of our entrypoints here
let entryPoints = {
    'app': dir + 'app',
    'needs': dir + 'needs',
    'urgent-needs': dir + 'urgent-needs',
    'needs-table': dir + 'needs-table',
    'urgent-needs-table': dir + 'urgent-needs-table',
    'map': dir + 'map',
    'users': dir + 'users',
    'volunteers': dir + 'volunteers'
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
