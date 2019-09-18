<?php
namespace App\Traits;

use App;
use Validator;
use App\Exceptions\MissingParametersException;

trait RequiredParameterTrait
{
    public function verifyRequiredParameter($request, $rules)
    {
        $validator_array = array_fill_keys($rules, 'required');
        $validator = Validator::make($request->all(), $validator_array);
        if ($validator->fails()) {
            throw new MissingParametersException($validator->errors());
        }
    }
}
