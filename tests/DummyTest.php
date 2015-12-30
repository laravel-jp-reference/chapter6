<?php

/**
 * 6-3 モデルファクトリ「Faker」
 *
 * Class DummyTest
 */
class DummyTest extends TestCase
{
    /**
     * リスト6.35：ダミーデータの利用例
     */
    public function testDummy()
    {
        $user = factory(\App\User::class)->make();
        $this->assertInternalType('array', $user->toArray());
    }

    public function testDummyFor4()
    {
        $user = factory(\App\User::class, 'guest', 4)->make();
        $this->assertSame(4, $user->count());
    }

    /**
     * リスト6.38：ダミーデータの値を指定
     */
    public function testDummyNameSpecified()
    {
        $user = factory(\App\User::class)->make(['name' => 'Laravel5']);
        $this->assertSame('Laravel5', $user->name);
    }
}
