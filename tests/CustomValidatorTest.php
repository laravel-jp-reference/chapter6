<?php

use App\Http\Validator\CustomValidator;

/**
 * Class CustomValidatorTest
 * カスタムバリデーションテスト例
 *
 * @see \App\Http\Validator\CustomValidator
 */
class CustomValidatorTest extends \TestCase
{
    public function testValidationLaravel()
    {
        $validator = \Closure::bind(function () {
            $validation = new CustomValidator(trans(), [], []);
            return $validation->validateLaravel([], 'TypeScript');
        }, null, CustomValidator::class)->__invoke();
        $this->assertFalse($validator);
    }

    public function testFunctionalValidationLaravel()
    {
        $validator = new CustomValidator(trans(),
            [
                'message' => 'TypeScript'
            ],
            [
                'message' => 'laravel'
            ]
        );
        $this->assertFalse($validator->passes());
    }
}
