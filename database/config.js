
const mongoose = require('mongoose');

const dbConnection = async () => {

    try {
        await mongoose.connect(process.env.MONGODBCONNECTION, {
            useNewUrlParser: true,
            useUnifiedTopology: true,
            useCreateIndex: true,
            useFindAndModify: true
        });

        console.log('Connected to database')

    }
    catch (err) {
        throw new Error('Error database connection')
    };

}

module.exports = {
    dbConnection
}