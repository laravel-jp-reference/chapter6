<?php

namespace App\Services;

use App\User;

/**
 * 6-4-2 データベースに依存したクラスのテスト
 *
 * リスト6.51：リファクタリングの例
 *
 * Class UserServiceTwo.
 */
class UserServiceTwo
{
    /** @var User */
    protected $user;

    /**
     * @param User $user
     * Laravelのサービスコンテナを利用して、EloquentORMのインスタンスを外から注入します
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getUsers()
    {
        return $this->user->all();
    }
}
