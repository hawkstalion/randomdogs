'use strict';

const Routes = require('./routes');

module.exports.plugin = {
    register: function (server, options) {
        server.route(Routes(server));
    },
    pkg: require('./package.json')
};