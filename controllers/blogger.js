const { response } = require('express')
const Blogger = require('../models/blogger')






const bloggersGet = async (req, res = response) => {

    const bloggers = await Blogger.find();

    if (!bloggers) {
        return res.status(401).json({
            ok: false,
            message: 'Bloggers not found'
        })
    }

    return res.json({
        bloggers
    });
}
const bloggersGetById = async (req, res = response) => {

    const id = req.params.id;
    const blogger = await Blogger.findById(id)

    if (!blogger) {

        return res.status(401).json({
            ok: false,
            message: 'Blogger not found'
        })
    }

    return res.json({
        blogger
    })
}

const bloggersPost = (req, res = response) => {

    const body = req.body;
    console.log(req.body)

    const blogger = new Blogger(body);
    blogger.save();

    return res.json({
        message: 'post API Controlador OK',
        blogger
    });
}

const bloggersDelete = async (req, res = response) => {

    const id = req.params.id;

    const blogger = await Blogger.findByIdAndDelete(id)

    if( !blogger ){
        return res.status(401).json({
            ok:false,
            message: 'Blogger not found!'
        })
    }

    return res.json({
        blogger
    });
}

module.exports = {
    bloggersGet,
    bloggersPost,
    bloggersDelete,
    bloggersGetById
}