const { Schema, model } = require('mongoose');

const bloggerSchema = Schema({

    Name: {
        type: String,
        required: [true, 'Names is required']
    },
    Email: {
        type: String,
        required: [true, 'Email is required'],
        unique: true
    },
    Website: {
        type: String,
    },
    Picture: {
        type: String
    },
    Friends: {
        type: Object
    },
});

module.exports = model('Blogger', bloggerSchema)