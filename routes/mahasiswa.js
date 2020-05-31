var express = require('express');
var router = express.Router();

router.get('/', function(req, res, next) {
	connection.query('SELECT * from mahasiswa', function (error, results, fields) {
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
	connection.query('SELECT * from mahasiswa where id_users=?', user_id, function (error, results, fields) {
	  	if(error){
	  		res.send(JSON.stringify({"status": 500, "error": error, "response": null})); 
	  	} else {
  			res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	  	}
  	});
});

router.put('/update', function(req, res, next) {
	let id = req.body.id;
	let nama = req.body.nama;
	let email = req.body.email;
	let nohp = req.body.nohp;
	let nim = req.body.nim;
	let keahlian = req.body.keahlian;
	let cv = req.body.cv;
	let pengalaman = req.body.pengalaman;
	let semester = req.body.semster;
	let angkatan = req.body.angkatan;
	// If you use photo
	// let foto = req.body.foto;
     if (!id) {
       return res.status(400).send({ error:true, message: 'Please provide mahasiswa' });
     }
	connection.query('UPDATE mahasiswa SET ? where id_users=?', [{ nama: nama, email: email, no_hp: nohp, nim: nim, keahlian: keahlian, cv: cv, pengalaman: pengalaman, semester: semester, angkatan: angkatan }, id], function (error, results, fields) {
	  	if(error){
	  		res.send(JSON.stringify({"status": 500, "error": error, "response": null})); 
	  	} else {
  			res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	  	}
  	});
});

module.exports = router;
