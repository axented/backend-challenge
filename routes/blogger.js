const { Router } = require('express')
const router = Router();
// const cors = require('cors');

const { bloggersGet, bloggersDelete, bloggersPost, bloggersGetById } = require('../controllers/blogger')

// router.use(cors())

router.get('/', bloggersGet);
router.get('/:id', bloggersGetById);
router.post('/', bloggersPost);
router.delete('/:id', bloggersDelete);

module.exports = router;

