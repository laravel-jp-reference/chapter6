<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserRepositoryTest extends \TestCase
{

    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->runDatabaseMigrations();
    }

    public function testGetRecords()
    {
        $factory = factory(\App\User::class)->create();
        $user = new \App\Repositories\UserRepository($factory);
        $result = $user->all();
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Collection::class, $result
        );
        $this->assertSame(1, count($result->toArray()));
    }

    public function testInsertNewRecord()
    {
        $params = [
            'name' => 'testing',
            'email' => 'testing',
            'password' => 'testing'
        ];
        $user = new \App\Repositories\UserRepository(new App\User);
        $result = $user->save($params);
        $this->assertSame(1, $result);
    }

    public function testNoInsert()
    {
        $params = [
            'name' => 'testing',
            'email' => 'testing',
            'password' => 'testing'
        ];
        factory(\App\User::class)->create($params);
        $user = new \App\Repositories\UserRepository(new App\User);
        // 同じレコードは挿入せずに返却することをテスト
        $user->save($params);
        $result = $user->all()->toArray();
        $this->assertSame(1, count($result));
        $this->assertSame($result[0]['name'], 'testing');
        $this->assertSame($result[0]['email'], 'testing');
        // パスワードは返却されないことをテスト
        $this->assertFalse(isset($result[0]['password']));
    }
}
