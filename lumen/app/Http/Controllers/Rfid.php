<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\EntityStandardFiltering;

class Rfid extends Controller
{
	use EntityStandardFiltering;

	/**
	 *
	 */
	public function list(Request $request)
	{
		$params = $request->query->all();
		return $this->_list("Rfid", $params);
	}

	/**
	 *
	 */
	public function create(Request $request)
	{
		$data = $request->json()->all();

		// Default values
		$data["status"] = $data["status"] ?? "inactive";

		return $this->_create("Rfid", $data);
	}

	/**
	 *
	 */
	public function read(Request $request, $key_id)
	{
		return $this->_read("Rfid", [
			"key_id" => $key_id
		]);
	}

	/**
	 *
	 */
	public function update(Request $request, $key_id)
	{
		$data = $request->json()->all();
		return $this->_update("Rfid", [
			"key_id" => $key_id
		], $data);
	}

	/**
	 *
	 */
	public function delete(Request $request, $key_id)
	{
		return $this->_delete("Rfid", [
			"key_id" => $key_id
		]);
	}
}