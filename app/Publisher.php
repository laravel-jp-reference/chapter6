<?php

namespace App;

use Illuminate\Broadcasting\BroadcastManager;

/**
 * 6-2 部分的なモック
 * Class Publisher.
 */
class Publisher
{
    /** @var BroadcastManager   */
    protected $broadcast;

    /**
     * @param BroadcastManager $broadcast
     */
    public function __construct(BroadcastManager $broadcast)
    {
        $this->broadcast = $broadcast;
    }

    /**
     * @return mixed
     */
    public function channel()
    {
        return config('channel');
    }

    /**
     * @param array $params
     */
    public function broadcast(array $params = [])
    {
        $channel = $this->channel();
        // 実装を記述します
        $this->broadcast->driver()->broadcast([$channel], 'publisher', $params);
    }
}
