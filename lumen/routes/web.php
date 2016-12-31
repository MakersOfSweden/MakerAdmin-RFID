<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->group(array(), function() use ($app)
{
	// RFID keys
	$app->   get("keys",      "Rfid@list");   // Get collection
	$app->  post("keys",      "Rfid@create"); // Model: Create
	$app->   get("keys/{id}", "Rfid@read");   // Model: Read
	$app->   put("keys/{id}", "Rfid@update"); // Model: Update
	$app->delete("keys/{id}", "Rfid@delete"); // Model: Delete
});