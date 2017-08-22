<?php namespace Domain\Api\Validators;

/**
 * Class CurrencyValidator
 * @package Domain\Api\Validators
 */
class CurrencyValidator extends BaseValidator
{
    protected $rules = [
      'amount' => 'not:0',
    ];


}
