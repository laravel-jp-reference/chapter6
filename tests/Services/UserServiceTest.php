<?php

use App\Services\UserService;
use Illuminate\Database\Eloquent\Collection;

/**
 * リスト6.57：スタブクラスに入れ替えたテストコード
 *
 * Class UserServiceTest
 *
 * @see \App\Services\UserService
 */
class UserServiceTest extends \TestCase
{
    /** @var UserService  */
    protected $service;

    public function setUp()
    {
        parent::setUp();
        $this->service = new UserService(new \StubUserRepository());
    }

    public function testGetUserRepository()
    {
        $this->assertInstanceOf(Collection::class, $this->service->getUsers());
    }
}

/**
 * スタブクラスを作成してそのまま利用する例です
 * Class StubUserRepository
 */
class StubUserRepository implements \App\Repositories\UserRepositoryInterface
{
    /**
     * @return array
     */
    public function all()
    {
        $user = factory(\App\User::class)->make();
        return (new \Illuminate\Database\Eloquent\Collection())
            ->add($user);
    }
}
