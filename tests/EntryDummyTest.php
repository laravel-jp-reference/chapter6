<?php

/**
 * リスト6.40：ダミーデータ挿入後、値を利用する例
 *
 * Class EntryDummyTest
 */
class EntryDummyTest extends \TestCase
{
    // このトレイトに含まれるメソッドは@beforeアノテーションが記述されています
    // これにより、各テスト実行時にマイグレーションが実行されます
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    public function testDummy()
    {
        factory(\App\Entry::class, 5)->create();
        $this->assertEquals(5, \App\Entry::all()->count());
    }
}
