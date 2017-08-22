<?php namespace Domain\Api\Validators;

use Illuminate\Support\Facades\Validator;

/**
 * Class AbstractValidator
 * @package Domain\Api\Validators
 */
abstract class AbstractValidator
{
    /**
   * Rules
   */
  protected $rules = array();

  /**
   * ValidationErrors
   */
  protected $validationErrors = array();

  /**
   * @param array $data
   *
   * @return \Illuminate\Validation\Validator
   */
  public function validate(array $data)
  {
      return Validator::make($data, $this->rules, $this->validationErrors);
  }

  /**
   * @param mixed $rules
   */
  public function setRules($rules)
  {
      $this->rules = $rules;
  }
}
