require('dotenv').config();

const express = require('express');
const app = express();

const cors = require('cors')
const { dbConnection } = require('./database/config')

// app.use(cors())
app.use(express.json())
dbConnection();
// Routes

app.use('/bloggers', cors(), require('./routes/blogger'))




app.listen(process.env.PORT, () => {
    console.log('backend Port: ', process.env.PORT)
});
