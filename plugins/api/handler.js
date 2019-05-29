'use strict';

const Wreck = require('@hapi/wreck');

const options = {
    json: 'strict',
    redirects: 5
};

const getDogsList = async (req, h) => {
//https://dog.ceo/api/breeds/list/all

    const response = await Wreck.request('GET','https://dog.ceo/api/breeds/list/all');
    const result = await Wreck.read(response, options);
    return result.message;
}

const getDogImage = async (req, h) => {
    
    let url = 'http://dog.ceo/api/breed'
    if(req.params.dog){
        url += `/${req.params.dog}/images/random`;
    } else {
        url += 's/image/random';
    }
    const response = await Wreck.request('GET', url, options);
    const result = await Wreck.read(response, options);
    return result.message;
}

module.exports = {
    getDogsList,
    getDogImage
}