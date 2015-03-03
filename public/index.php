<?php

	# Include the vendors autoload

	require("../vendor/autoload.php");

	# instantiates a new Slim Application

	$app = new \Slim\Slim(array(

		#Adds application settings

		'view' => new \Slim\Views\Blade(),

		'templates.path' => '../templates',

	));

	#setup templates compiled cache

	$view = $app->view();

	$view->parserOptions = array(

		'debug' => true,

		'cache' => "../html_cache"

	);

	# defines a route for the GET method

	$app->get("/", function() use ($app){

		$app->render('index', array('title' => 'This is template title variable'));

	});

	# defines a route for the GET method

	$app->get("/:custom", function($custom) use ($app){

		$app->render('index', array('title' => $custom));

	});

	# Actually runs the application

	$app->run();
