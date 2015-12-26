<?php

	require 'vendor/autoload.php';
	$app = new \Slim\Slim();

	// ActiveRecord\Config::initialize(function($cfg){
	// 	$cfg->set_model_directory('models');
	// 	$cfg->set_connections(array(
	// 		'development' => 'mysql://root:27marthinz@localhost/kampus'));
	// });

	$app->get('/', function(){
		echo 'Hello Slim :)';
	});
	$app->get('/halo(/:nama)', function($nama = null){
		echo "Hallo ".$nama."!";
	});
	$app->get('/home(/:nama)',function($nama = null)use($app){
		$app->view()->appendData( array('nama' => $nama));
		$app->render("home.php");
	});

	$app->get('/show', function()use($app){
		// with activerecord
		// $data = Mahasiswa::all();
		// echo json_encode(array_map(function($res){
		// 	return $res->to_array();
		// },$data));
		// 
		// with elequent
		echo Mahasiswa::all()->toJson();
	});

	$app->post('/insert', function()use($app){
		$mhs = new Mahasiswa;
		$mhs->nama = $app->request->post('nama');
		echo $mhs->save();
	});

	$app->put('/update/:kode', function($kode)use($app){
		$mhs = Mahasiswa::find($kode);
		$mhs->nama = $app->request->put('nama');
		echo $mhs->save();
	});

	$app->delete('hapus/:kode', function($kode)use($app){
		echo Mahasiswa::find($kode)->delete();
	});
	
	$app->run();
