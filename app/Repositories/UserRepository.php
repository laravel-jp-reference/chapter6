<?php

namespace App\Repositories;

use App\User;

/**
 * リスト6.55：インターフェイスの実装例
 *
 * Class UserRepository.
 */
class UserRepository implements UserRepositoryInterface
{
    /** @var User  */
    protected $eloquent;

    /**
     * App\Services\UserServiceTwoクラスと異なり、
     * データ操作の抽象化レイヤクラスを利用意します
     * Laravelのサービスコンテナはプロジェクト内のどんなクラスからでも利用できます
     *
     * @param User $eloquent
     */
    public function __construct(User $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->eloquent->all();
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function save(array $params)
    {
        $result = $this->eloquent->firstOrCreate($params);
        return $result->id;
    }
}
