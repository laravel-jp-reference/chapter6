<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;

/**
 * リスト6.65：コントローラのファンクショナルテスト
 *
 * Class UserControllerTest
 *
 * @see \App\Http\Controllers\UserController
 */
class UserControllerTest extends \TestCase
{
    /** ミドルウェアを無効にします */
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
        $this->app->bind(
            \App\Repositories\UserRepositoryInterface::class,
            \StubUser::class
        );
    }

    public function testIndex()
    {
        $this->visit('user')->see('No users', true);
    }

    /**
     * リスト6.67：未ログイン、バリデーション失敗によるリダイレクトをテスト
     *
     * 未ログイン状態でフォームリクエストでForbiddenが表示されることをテスト
     */
    public function testNoLoginUserRequestForStore()
    {
        $params = [
            'name'                  => 'testing',
            'email'                 => 'testing@example.com',
            'password'              => 'testing',
            'password_confirmation' => 'testing',
        ];
        $this->post('user', $params)->see('Forbidden')->assertResponseStatus(403);
    }

    /**
     * ログイン状態でバリデーションを失敗することをテスト
     */
    public function testLoginUSerRequestForStore()
    {
        $this->be(factory(\App\User::class)->make());
        $this->post('user', [])->assertRedirectedToRoute('user.index');
    }

    /**
     * リスト6.68：正常系動作をテスト
     */
    public function testSuccess()
    {
        $params = [
            'name'                  => 'testing',
            'email'                 => 'testing@example.com',
            'password'              => 'testing',
            'password_confirmation' => 'testing',
        ];
        $this->be(factory(\App\User::class)->make());
        $this->makeRequest('POST', 'user', $params)
            ->see('Complete')
            ->click('user list')
            ->seePageIs('user');
    }
}

class StubUser implements \App\Repositories\UserRepositoryInterface
{
    /**
     * @return array
     */
    public function all()
    {
        return factory('App\User', 5)->make();
    }

    /**
     * @param array $params
     *
     * @return mixed
     */
    public function save(array $params)
    {
        return 1;
    }
}
