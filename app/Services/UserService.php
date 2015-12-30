<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

/**
 * 6-4-2 データベースに依存したクラスのテスト
 *
 * リスト6.54：タイプヒンティングをインターフェイスへ変更
 *
 * Class UserService.
 */
class UserService
{
    /** @var UserRepositoryInterface  */
    protected $user;

    /**
     * @param UserRepositoryInterface $user
     */
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->user->all();
    }
}
