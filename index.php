<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Init app instance
$app = require "./core/app.php";

// Get all users from DB, eager load all fields using '*'
$users = User::find($app->db,'*');

// Render view 'views/index.php' and pass users variable there
$app->renderView('index', array(
	'users' => $users
));
