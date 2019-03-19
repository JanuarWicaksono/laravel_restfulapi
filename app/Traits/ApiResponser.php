<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{
	private function successReponse($data, $code)
	{
		return response()->json($data, $code);
	}

	protected function errorResponse($message, $code)
	{
		return response()->json(['error' => $message, 'code' => $code], $code);
	}

	protected function showAll(Collection $collection, $code = 200)
	{
		return $this->successReponse(['data' => $collection], $code);
	}

	protected function showOne(Model $model, $code = 200)
	{
		return $this->successReponse(['data' => $model], $code);	
	}

	protected function showMessage($message, $code = 200)
	{
		return $this->successReponse(['data' => $message], $code);	
	}
}