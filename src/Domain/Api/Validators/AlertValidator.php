<?php namespace Domain\Api\Validators;

/**
 * Class AlertValidator
 * @package Domain\Api\Validators
 */
class AlertValidator extends BaseValidator
{
    protected $rules = [
      'alert' => 'required',
      'email' => 'required|email',
    ];


}
