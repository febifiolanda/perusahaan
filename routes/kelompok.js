var express = require('express');
var router = express.Router();

router.get('/', function(req, res, next) {
	connection.query('SELECT *,count(id_kelompok_detail) as jumlah FROM `kelompok` JOIN kelompok_detail on kelompok_detail.id_kelompok=kelompok.id_kelompok group by kelompok.id_kelompok', function (error, results, fields) {
	  	if(error){
	  		res.send(JSON.stringify({"status": 500, "error": error, "response": null})); 
	  	} else {
  			res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	  	}
  	});
});

router.get('/:id', function(req, res, next) {
	let kelid = req.params.id;
	if (!kelid) {
      return res.status(400).send({ error: true, message: 'Please provide kelid' });
     }
	connection.query('SELECT * FROM `kelompok_detail` RIGHT JOIN `kelompok` ON `kelompok_detail`.`id_kelompok`=`kelompok`.`id_kelompok` JOIN `lowongan` ON  `lowongan`.`id_lowongan`=`kelompok`.`id_lowongan` JOIN `perusahaan` ON `perusahaan`.`id_perusahaan`=`lowongan`.`id_perusahaan` JOIN `mahasiswa` ON `mahasiswa`.`id_mahasiswa`=`kelompok_detail`.`id_mahasiswa` JOIN `dosen` ON `dosen`.`id_dosen`=`kelompok`.`id_dosen` where id_users=?', kelid, function (error, results, fields) {
	  	if(error){
	  		res.send(JSON.stringify({"status": 500, "error": error, "response": null})); 
	  	} else {
  			res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	  	}
  	});
});

router.post('/create', function(req, res, next) {
	let nama_kelompok = req.body.nama_kelompok;
	let id_periode = req.body.id_periode;
	let quota = req.body.quota;
	let keterangan = req.body.keterangan;
     if (!nama_kelompok && !id_periode && !quota && !keterangan) {
       return res.status(400).send({ error:true, message: 'Please provide full information' });
     }
	connection.query('INSERT INTO kelompok SET ? ', { nama_kelompok: nama_kelompok, id_periode: id_periode, quota:quota, keterangan:keterangan }, function (error, results, fields) {
	  	if(error){
	  		res.send(JSON.stringify({"status": 500, "error": error, "response": null})); 
	  	} else {
  			res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	  	}
  	});
});

router.post('/register', function(req, res, next) {
	let id_kelompok = req.body.id_kelompok;
	let id_users = req.body.id_users;
	let status = req.body.status;
	if (!id_users && !id_kelompok) {
      return res.status(400).send({ error: true, message: 'Please provide id' });
     }
	connection.query('SELECT id_mahasiswa FROM mahasiswa where id_users = ? ', id_users, function (error, results, fields) {
	  	if(error){
	  		res.send(JSON.stringify({"status": 500, "error": error, "response": null})); 
	  	} else {
  			connection.query('INSERT INTO kelompok_detail SET ? ', {id_kelompok: id_kelompok,id_mahasiswa: results[0].id_mahasiswa, status: status}, function (error, rez, fields) {
  				if(error){
		  		res.send(JSON.stringify({"status": 500, "error": error, "response": null})); 
			  	} else {
		  			res.send(JSON.stringify({"status": 200, "error": null, "response": rez}));
			  	}
  			});
	  	}
  	});
});

router.put('/pendaftaranListing', function(req, res, next) {
	let id_kelompok = req.body.id_kelompok;
	let id_dosen = req.body.id_dosen;
	let id_lowongan = req.body.id_lowongan;
     if (!id_kelompok && !id_dosen && !id_lowongan) {
       return res.status(400).send({ error:true, message: 'Please provide all' });
     }
	connection.query('UPDATE kelompok SET ? where id_kelompok=?', [{ id_dosen: id_dosen, id_lowongan: id_lowongan}, id_kelompok], function (error, results, fields) {
	  	if(error){
	  		res.send(JSON.stringify({"status": 500, "error": error, "response": null})); 
	  	} else {
  			res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	  	}
  	});
});

module.exports = router;
