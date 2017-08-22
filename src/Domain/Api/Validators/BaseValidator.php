<?php namespace Domain\Api\Validators;

/**
 * Class BaseValidator
 * @package Domain\Api\Validators
 */
class BaseValidator extends AbstractValidator
{
    /**
     * @param array $data
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validate(array $data)
    {
        $validator = parent::validate($data);
        return $validator;
    }
}