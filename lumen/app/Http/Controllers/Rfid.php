<?php

namespace App\Http\Controllers;

class Rfid extends Controller
{
	public function list()
	{
		return ["todo" => "list"];
	}

	public function read()
	{
		return ["todo" => "read"];
	}

	public function create()
	{
		return ["todo" => "create"];
	}

	public function update()
	{
		return ["todo" => "update"];
	}

	public function delete()
	{
		return ["todo" => "delete"];
	}
}