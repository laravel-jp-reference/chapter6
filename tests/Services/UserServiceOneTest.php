<?php

use App\Services\UserServiceOne;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * testingとして追加したsqliteインメモリデータベースを利用してテストします
 * こうしたテストの場合は、実装コードではなく、
 * データベース自体のテストを行うケースが多くなりますので、注意が必要です。
 *
 * Class UserServiceOneTest
 *
 * @see \App\Services\UserServiceOne
 */
class UserServiceOneTest extends \TestCase
{
    use DatabaseMigrations;

    /** @var UserServiceOne  */
    protected $service;

    public function setUp()
    {
        parent::setUp();
        $this->service = new UserServiceOne;
    }

    /**
     * リスト6.50：データベースを利用したテスト
     */
    public function testDatabaseDependencyUsers()
    {
        // モデルファクトリでレコードを挿入します
        factory(\App\User::class)->create();
        $this->assertInstanceOf(Collection::class, $this->service->getUsers());
        // その他のテストコード
    }
}
