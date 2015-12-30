<?php

/**
 * 6-1-3 テストの記述 テストコードサンプル
 * Class BookRepositoryTest
 *
 * このテストはフレームワークに依存しないテストのため、
 * \TestCaseクラスは継承していません
 *
 * @see \App\Repositories\BookRepository
 */
class BookRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var \App\Repositories\BookRepository */
    protected $repository;

    protected function setUp()
    {
        $this->repository = new \App\Repositories\BookRepository;
    }

    /**
     * リスト6.3：シンプルなユニットテストコード
     */
    public function testReturnResultBasic()
    {
        $this->assertInternalType('array', $this->repository->getReferenceBooks());
        $this->assertSame(1, count($this->repository->getReferenceBooks()));
    }

    /**
     * リスト6.3：シンプルなユニットテストコード
     * @test
     */
    public function 値の返却をテスト()
    {
        // 日本語のメソッド名であっても@testアノテーションを利用することで
        // テストを実行することができます。
        $this->assertInternalType('array', $this->repository->getReferenceBooks());
    }

    /**
     * リスト6.5：配列内に特定のキーをテスト
     */
    public function testReturnResult()
    {
        $this->assertInternalType('array', $this->repository->getReferenceBooks());
        foreach ($this->repository->getReferenceBooks() as $book) {
            $this->assertArrayHasKey('title', $book);
        }
    }

    /**
     * リスト6.7：getReferenceBook をテストするコード
     * @throws \Exception
     */
    public function testReturnBook()
    {
        $result = $this->repository->getReferenceBook(1);
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('title', $result);
        $this->assertArrayHasKey('id', $result);
        $this->assertNull($this->repository->getReferenceBook(10));
    }

    /**
     * リスト6.8：例外をテスト
     * @expectedException \Exception
     */
    public function testReturnBookException()
    {
        $this->repository->getReferenceBook();
    }

    /**
     * @expectedException \Exception
     */
    public function testAddBookException()
    {
        $this->repository->setReferenceBook([]);
        $this->repository->setReferenceBook(['id' => 1]);
        $this->repository->setReferenceBook(['title' => 'testing']);
    }

    /**
     * リスト6.10：データプロバイダを利用したテストコード
     * @dataProvider addBookData
     */
    public function testSetBooks(array $params)
    {
        $this->repository->setReferenceBook($params);
        $books = $this->repository->getReferenceBooks();
        foreach ($books as $book) {
            $this->assertArrayHasKey('title', $book);
            $this->assertArrayHasKey('id', $book);
        }
    }

    /**
     * 書籍データを追加
     * @return array
     */
    public function addBookData()
    {
        return [
            [
                [
                    'id' => 2,
                    'title' => 'AngularJSリファレンス'
                ],
            ]
        ];
    }

    /**
     * リスト6.11：テスト間の依存
     * @return array|null
     * @throws Exception
     */
    public function testReturnBookDepend()
    {
        $result = $this->repository->getReferenceBook(1);
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('title', $result);
        $this->assertArrayHasKey('id', $result);
        $this->assertNull($this->repository->getReferenceBook(10));
        return $result;
    }

    /**
     * @depends testReturnBookDepend
     * @test
     */
    public function 依存を利用したテスト($params)
    {
        $this->assertSame($params['title'], 'Laravelリファレンス');
    }

    /**
     * リスト6.13：protected 宣言されたメソッドをテスト 1
     * @test
     */
    public function protectedメソッドに対してリフレクションを利用したテスト()
    {
        $reflectionClass = new \ReflectionClass($this->repository);
        $reflectionMethod = $reflectionClass->getMethod('getText');
        $reflectionMethod->setAccessible(true);
        $this->assertEquals('Laravel5', $reflectionMethod->invoke($this->repository));
    }

    /**
     * リスト6.13：protected 宣言されたメソッドをテスト 2
     * @test
     */
    public function protectedメソッドに対してClosureを利用したテスト()
    {
        $value = \Closure::bind(function () {
            $repository = new \App\Repositories\BookRepository;
            return $repository->getText();
        }, null, App\Repositories\BookRepository::class)->__invoke();
        $this->assertEquals('Laravel5', $value);
    }
}
