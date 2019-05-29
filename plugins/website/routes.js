'use strict';

module.exports = (server) => {
    return [
        {
            path: '/{path*}',
            method: 'GET',
            handler: {
                directory: {
                    path: require('path').join(__dirname + '/html/'),
                    redirectToSlash: true,
                    index: true
                }
            }
        }
    ];
};