<?php

$app = require "./core/app.php";

// Create new instance of user
$user = new User($app->db);

$response = [
	"ok" => false,
	"row" => '',
	'message' => 'There was an error submiting your request!',
];

// Validate input
$name = @$_POST['name'];
$email = @$_POST['email'];
$city = @$_POST['city'];
$phone = @$_POST['phone'] ?? '';

do{

    if(!strlen($name))
    $response['message'] = 'Used name can not be empty!';
    break;

    if(!strlen($city))
    $response['message'] = 'City can not be empty!';
    break;

    if(!strlen($email))
    $response['message'] = 'Email address seems to be invalid!';
    break;

    if($user->emailExists($email))
    $response['message'] = 'Email address already exists!';
    break;

}while(false);


// Build database data
$db_data =  [
    'name' => $name,
    'email' => $email,
    'city' => $city,
    'phone' => $phone
];

// Insert it to database with POST data
$user->insert($db_data);

//Add data to response
$response['row'] .= '<td>'.htmlspecialchars($name).'</td>';
$response['row'] .= '<td>'.htmlspecialchars($email).'</td>';
$response['row'] .= '<td>'.htmlspecialchars($city).'</td>';
$response['row'] .= '<td>'.htmlspecialchars($phone).'</td>';
$response['message'] = 'Used added successfully!';
$response['ok'] = true; 


// Write response
header('Content-Type: application/json');
echo json_encode($response);

