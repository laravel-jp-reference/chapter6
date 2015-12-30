<?php

namespace App\Services;

use App\User;

/**
 * 6-4-2 データベースに依存したクラスのテスト
 *
 * Class UserServiceOne.
 */
class UserServiceOne
{
    /**
     * リスト6.47：シンプルなサービスクラス
     *
     * 1). データベースに依存したテストが難しいコード例.
     * このメソッドの様にEloquentORMを利用しているクラスはテストが難しくなります
     * コントローラや、このクラスの様なサービスクラスなどであっても同様にテストが難しい状態です
     *
     * @return mixed
     */
    public function getUsers()
    {
        // データベース接続している状態でなければテストができません
        return User::all();
    }
}
