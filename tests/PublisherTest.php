<?php

/**
 * Class PublisherTest
 *
 * @see \App\Publisher
 */
class PublisherTest extends \TestCase
{
    /**
     * リスト6.32：パーシャルモックの利用方法
     */
    public function testBroadcast()
    {
        $broadcastLog = base_path('/tests/tmp/broadcast.log');
        \Log::useFiles($broadcastLog);
        $mock = \Mockery::mock(new \App\Publisher(
            new \Illuminate\Broadcasting\BroadcastManager($this->app)
        ))->makePartial();
        $mock->shouldReceive('channel')->andReturn('laravel5.1');
        $mock->broadcast([]);
        $this->assertFileExists($broadcastLog);
        $this->beforeApplicationDestroyed(function () use ($broadcastLog) {
            \File::delete($broadcastLog);
        });
    }

    /**
     * リスト6.33：makePartial を利用するパーシャルモック
     */
    public function testBroadcastPartial()
    {
        $broadcastLog = base_path('/tests/tmp/broadcast.log');
        \Log::useFiles($broadcastLog);
        $mock = \Mockery::mock(new \App\Publisher(
            new \Illuminate\Broadcasting\BroadcastManager($this->app)
        ))->makePartial();
        $mock->shouldReceive('channel')->andReturn('laravel5.1');
        $mock->broadcast([]);
        $this->assertFileExists($broadcastLog);
        $this->beforeApplicationDestroyed(function () use ($broadcastLog) {
            \File::delete($broadcastLog);
        });
    }
}
