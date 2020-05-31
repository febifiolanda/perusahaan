var express = require('express');
var router = express.Router();

router.get('/', function(req, res, next) {
	connection.query('SELECT * from users', function (error, results, fields) {
	  	if(error){
	  		res.send(JSON.stringify({"status": 500, "error": error, "response": null})); 
	  	} else {
  			res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	  	}
  	});
});
router.get('/:id', function(req, res, next) {
	let user_id = req.params.id;
	if (!user_id) {
      return res.status(400).send({ error: true, message: 'Please provide user_id' });
     }
	connection.query('SELECT * from users where id_users=?', user_id, function (error, results, fields) {
	  	if(error){
	  		res.send(JSON.stringify({"status": 500, "error": error, "response": null})); 
	  	} else {
  			res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	  	}
  	});
});

router.post('/add', function(req, res, next) {
	let username = req.body.username;
	let password = req.body.password;
     if (!username && !password) {
       return res.status(400).send({ error:true, message: 'Please provide user' });
     }
	connection.query('INSERT INTO users SET ? ', { username: username, password: password }, function (error, results, fields) {
	  	if(error){
	  		res.send(JSON.stringify({"status": 500, "error": error, "response": null})); 
	  	} else {
  			res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	  	}
  	});
});

router.put('/update', function(req, res, next) {
	let id = req.body.id;
	let username = req.body.username;
	let password = req.body.password;
     if (!id && username && !password) {
       return res.status(400).send({ error:true, message: 'Please provide user' });
     }
	connection.query('UPDATE users SET ? where id_users=?', [{ username: username, password: password }, id], function (error, results, fields) {
	  	if(error){
	  		res.send(JSON.stringify({"status": 500, "error": error, "response": null})); 
	  	} else {
  			res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	  	}
  	});
});

router.delete('/delete', function(req, res, next) {
	let id = req.body.id;
     if (!id) {
       return res.status(400).send({ error:true, message: 'Please provide user' });
     }
	connection.query('DELETE FROM users where id_users=?', id, function (error, results, fields) {
	  	if(error){
	  		res.send(JSON.stringify({"status": 500, "error": error, "response": null})); 
	  	} else {
  			res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	  	}
  	});
});

module.exports = router;
