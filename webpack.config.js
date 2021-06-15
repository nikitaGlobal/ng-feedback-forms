const path = require('path');
module.exports = {
    entry: './assets/private/js/main.js',
    output: {
        path: path.resolve(__dirname, './assets/public/js'),
        filename: "[name].js"
    },
    optimization: {
        minimize: true
    }
};
