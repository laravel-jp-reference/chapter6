<?php

/**
 * Class BasicMiddlewareTest
 *
 * @see \App\Http\Middleware\BasicMiddleware
 */
class BasicMiddlewareTest extends \TestCase
{
    /** @var App\Http\Middleware\BasicMiddleware */
    protected $middleware;

    /** @var Illuminate\Http\Request  */
    protected $request;

    public function setUp()
    {
        parent::setUp();
        $this->middleware = new \App\Http\Middleware\BasicMiddleware;
        $this->request = new \Illuminate\Http\Request;
    }

    /**
     * リスト6.44：ミドルウェアクラスのユニットテストの準備
     */
    public function testHandleFails()
    {
        $this->middleware->handle($this->request, function() {});
    }

    /**
     * リスト6.45：ミドルウェアを通過しないことをテストする
     */
    public function testFailedHandle()
    {
        $response = $this->middleware->handle($this->request, function() {});
        // リダイレクトレスポンスが返却されます
        $this->assertEquals(true, $response->isRedirection());
    }

    /**
     * リスト6.46：ミドルウェア通過をテストする
     */
    public function testHandlePass()
    {
        $this->request['id'] = 1;
        $response = $this->middleware->handle($this->request, function() {
            return 'OK';
        });
        $this->assertSame('OK', $response);
    }
}
