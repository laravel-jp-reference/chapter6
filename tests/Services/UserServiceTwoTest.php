<?php

use App\Services\UserServiceTwo;
use Illuminate\Database\Eloquent\Collection;

/**
 * リファクタリングによるテストコードの違い
 * UserServiceOneTestとの違いに注目してみましょう
 *
 * Class UserServiceTwoTest
 *
 * @see \App\Services\UserServiceTwo
 */
class UserServiceTwoTest extends \TestCase
{
    /** @var UserServiceTwo  */
    protected $service;

    public function setUp()
    {
        parent::setUp();
        $user = factory(\App\User::class)->make();
        // Eloquentを継承した\App\Userクラスをモックします
        $mock = Mockery::mock(new \App\User())->makePartial();
        $mock->shouldReceive('all')->andReturn(
            (new Collection())->add($user)
        );
        $this->service = new UserServiceTwo($mock);
    }

    /**
     * リスト6.52：App\User クラスをモック
     */
    public function testGetUsers()
    {
        $this->assertInstanceOf(Collection::class, $this->service->getUsers());
    }
}
