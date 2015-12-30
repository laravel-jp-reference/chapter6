<?php

namespace App\Http\Validator;

use Illuminate\Validation\Validator;

/**
 * 書籍では紹介していませんが、
 * Laravelの機能を使ってカスタムバリデーションのテストも実行できます
 * Class CustomValidator.
 */
class CustomValidator extends Validator
{
    /**
     * @param $attribute
     * @param $value
     * @return int
     */
    protected function validateLaravel($attribute, $value)
    {
        return ($value === 'Laravel5');
    }
}
