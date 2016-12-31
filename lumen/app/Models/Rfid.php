<?php

namespace App\Models;

use App\Models\Entity;
use DB;

/**
 *
 */
class Rfid extends Entity
{
	protected $type = "rfid";
	protected $table = "rfid";
	protected $id_column = "key_id";
	protected $deletable = true;
	protected $columns = [
		"key_id" => [
			"column" => "rfid.rfid_id",
			"select" => "rfid.rfid_id",
		],
		"created_at" => [
			"column" => "rfid.created_at",
			"select" => "DATE_FORMAT(rfid.created_at, '%Y-%m-%dT%H:%i:%sZ')",
		],
		"updated_at" => [
			"column" => "rfid.updated_at",
			"select" => "DATE_FORMAT(rfid.updated_at, '%Y-%m-%dT%H:%i:%sZ')",
		],
		"title" => [
			"column" => "rfid.title",
			"select" => "rfid.title",
		],
		"description" => [
			"column" => "rfid.description",
			"select" => "rfid.description",
		],
		"tagid" => [
			"column" => "rfid.tagid",
			"select" => "rfid.tagid",
		],
		"status" => [
			"column" => "rfid.status",
			"select" => "rfid.status",
		],
		"startdate" => [
			"column" => "rfid.startdate",
			"select" => "DATE_FORMAT(rfid.startdate, '%Y-%m-%dT%H:%i:%sZ')",
		],
		"enddate" => [
			"column" => "rfid.enddate",
			"select" => "DATE_FORMAT(rfid.enddate, '%Y-%m-%dT%H:%i:%sZ')",
		],
	];
	protected $sort = ["created_at", "desc"];
	protected $validation = [
//		"tagid" => ["unique", "required"],
	];

	public function _search($query, $search)
	{
		$words = explode(" ", $search);
		foreach($words as $word)
		{
			$query = $query->where(function($query) use($word) {
				// Build the search query
				$query
					->  where("rfid.title",       "like", "%".$word."%")
					->  where("rfid.description", "like", "%".$word."%")
					->orWhere("rfid.tagid",       "like", "%".$word."%");
			});
		}

		return $query;
	}
}