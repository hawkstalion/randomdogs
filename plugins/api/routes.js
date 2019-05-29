'use strict';

const Handlers = require('./handler');

module.exports = (server) => {
    return [
        {
            path: '/dogs/list',
            method: 'GET',
            handler: Handlers.getDogsList
        },
        {
            path: '/dogs/{dog?}',
            method: 'GET',
            handler: Handlers.getDogImage
        }
    ];
};