<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Rfid as RfidModel;

use App\Traits\Pagination;
use App\Traits\EntityStandardFiltering;

class Rfid extends Controller
{
	use Pagination, EntityStandardFiltering;

	/**
	 *
	 */
	public function list(Request $request)
	{
		return $this->_applyStandardFilters("Rfid", $request);
	}

	/**
	 *
	 */
	public function read(Request $request, $rfid_id)
	{
		// Load the entity
		$entity = RfidModel::load([
			"rfid_id" => $rfid_id
		]);

		// Generate an error if there is no such rfid entity
		if(false === $entity)
		{
			return Response()->json([
				"status"  => "error",
				"message" => "Could not find any entity with specified rfid_id",
			], 404);
		}
		else
		{
			return Response()->json([
				"data" => $entity->toArray(),
			], 200);
		}
	}

	/**
	 *
	 */
	public function create(Request $request)
	{
		$json = $request->json()->all();

		// Create new RFID entity
		$entity = new RfidModel;
		$entity->description = $json["description"] ?? null;
		$entity->tagid       = $json["tagid"]       ?? null;
		$entity->status      = $json["status"]      ?? "inactive";
		$entity->startdate   = $json["startdate"]   ?? null;
		$entity->enddate     = $json["enddate"]     ?? null;

		// Validate input
		$entity->validate();

		// Save entity
		$entity->save();

		// Send response to client
		return Response()->json([
			"status" => "created",
			"data" => $entity->toArray(),
		], 201);
	}

	/**
	 *
	 */
	public function update(Request $request, $rfid_id)
	{
		// Load the entity
		$entity = RfidModel::load([
			"rfid_id" => $rfid_id
		]);

		// Generate an error if there is no such rfid entity
		if(false === $entity)
		{
			return Response()->json([
				"message" => "Could not find any entity with specified rfid_id",
			], 404);
		}

		$json = $request->json()->all();

		// Populate the entity with new values
		foreach($json as $key => $value)
		{
			$entity->{$key} = $value ?? null;
		}

		// Validate input
		$entity->validate();

		// Save the entity
		$entity->save();

		// Send response to client
		return Response()->json([
			"status" => "updated",
			"data" => $entity->toArray(),
		], 200);
	}

	/**
	 *
	 */
	public function delete(Request $request, $rfid_id)
	{
		// Load the entity
		$entity = RfidModel::load([
			"rfid_id" => $rfid_id
		]);

		// Generate an error if there is no such rfid entity
		if(false === $entity)
		{
			return Response()->json([
				"status"  => "error",
				"message" => "Could not find any entity with specified rfid_id",
			], 404);
		}

		if($entity->delete())
		{
			return Response()->json([
				"status"  => "deleted",
				"message" => "The rfid entity was successfully deleted",
			], 200);
		}
		else
		{
			return Response()->json([
				"status"  => "error",
				"message" => "An error occured when trying to delete rfid entity",
			], 500);
		}
	}
}