<?php

return [
	/*
	 * --------------------------------------------------------------------------------------------
	 *  Wire Application Name
	 * --------------------------------------------------------------------------------------------
	 *
	 * This name is used to be shown everywhere in wire interface.
	 */
	'name' => 'Wire',

	/*
	 * --------------------------------------------------------------------------------------------
	 *  Model Path
	 * --------------------------------------------------------------------------------------------
	 *
	 * Allows Wire to automatically discover available Model when an identifier is created
	 */
	'model_path' => 'App\\',

	/*
	 * --------------------------------------------------------------------------------------------
	 *  Authenticate With
	 * --------------------------------------------------------------------------------------------
	 *
	 * The parameters in authenticate_with are used to log user in with the given parameters.
	 *
	 * Key in the parameters are used as database columns, and the value is the type of the
	 * parameter. Currently you can have two types of columns. Either string such as
	 * username or email which in that case the field will be checked to see if it satisfies
	 * parameters of an email address.
	 */
	'authenticate_with' => [
		"username" => "string",
		'email' => "email"
	],


	/*
	 * --------------------------------------------------------------------------------------------
	 *  Guard
	 * --------------------------------------------------------------------------------------------
	 *
	 * You can modify wire_guard field to protect access to the Admin Panel vie your custom guard.
	 * By default laravel has web, and api guards.
	 *
	 * You can add guards in auth.php
	 * For more information visit laravel.com
	 */
	'wire_guard' => 'web',
];
