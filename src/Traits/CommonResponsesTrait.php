<?php

namespace GauravD\LaravelJsonResponder\Traits;

use Illuminate\Http\Response;
use Illuminate\Validation\Validator;


trait CommonResponsesTrait
{

	public function respondSuccess(int $statusCode = 200)
	{
		return
			$this
				->setNoData(true)
				->setStatusCode($statusCode)
				->respond();
	}

	public function respondFailed(int $statusCode = 200)
	{
		return
			$this
				->setNoData(true)
				->setSuccess(false)
				->setStatusCode($statusCode)
				->respond();
	}

	public function respondErrors(array $errors = [], int $statusCode = 200)
	{
		return
			$this
				->setErrors($errors)
				->setStatusCode($statusCode)
				->respond();
	}

	public function respondValidationErrors(Validator $validator)
	{
		return
			$this
				->setErrors([
					'validation' => $validator->errors()
				])
				->respond();
	}

	public function respondUnauthorizedError($message = 'Unauthorized!')
    {
        return $this
        	->setStatusCode(Response::HTTP_UNAUTHORIZED)
        	->setErrors([$message])
        	->respond();
    }

	public function respondForbiddenError($message = 'Forbidden!')
    {
        return $this
        	->setStatusCode(Response::HTTP_FORBIDDEN)
        	->setErrors([$message])
        	->respond();
    }

    public function respondNotFound($message = 'Not Found!')
    {
        return $this
        	->setStatusCode(Response::HTTP_NOT_FOUND)
        	->setErrors([$message])
        	->respond();
    }

    public function respondInternalError($message = 'Internal Error!')
    {
        return $this
        	->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)
        	->setErrors([$message])
        	->respond();
    }

    public function respondServiceUnavailable($message = "Service Unavailable!")
    {
        return $this
        	->setStatusCode(Response::HTTP_SERVICE_UNAVAILABLE)
        	->setErrors([$message])
        	->respond();
    }


}
