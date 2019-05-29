'use strict';

const Hapi = require('@hapi/hapi');

const init = async () => {

    const server = Hapi.server({
        port: process.env.PORT || 8080,
        host: '0.0.0.0'
    });

    await server.register([
        {
            plugin: require('@hapi/inert')
        },
        {
            plugin: require('./plugins/website/index')
        },
        {
            plugin: require('./plugins/api/index')
        }
    ])

    await server.start();
    console.log('Server running on %s', server.info.uri);
};

process.on('unhandledRejection', (err) => {

    console.log(err);
    process.exit(1);
});

init();