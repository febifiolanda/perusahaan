var express = require('express');
var router = express.Router();

router.get('/', function(req, res, next) {
	connection.query('SELECT * FROM `lowongan` JOIN perusahaan ON perusahaan.id_perusahaan = lowongan.id_perusahaan', function (error, results, fields) {
	  	if(error){
	  		res.send(JSON.stringify({"status": 500, "error": error, "response": null})); 
	  	} else {
  			res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	  	}
  	});
});


module.exports = router;
