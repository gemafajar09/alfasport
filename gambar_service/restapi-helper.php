<?php 
class restApi {
	public static function ok($data = null)
	{
		if($data == null)
		{
			return json_encode(array("status" => true));
		}

		return json_encode(array("status" => true, "data" => $data));
	}

	public static function error($data = null)
	{
		if($data == null)
		{
			return json_encode(array("status" => false));
		}
		
		return json_encode(array("status" => false, "data" => $data));
	}
}