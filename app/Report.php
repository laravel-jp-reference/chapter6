<?php

namespace App;

use Illuminate\Filesystem\Filesystem;

/**
 * 6-2 モックを利用したテスト
 * Class Report.
 */
class Report
{
    /** @var Filesystem  */
    protected $file;

    /**
     * リスト6.16：Filesystem を利用したクラス
     *
    public function __construct()
    {
        $this->file = new Filesystem();
    }
     */

    /**
     * リスト6.17：タイプヒンティングでFilesystem クラスを記述
     * @param Filesystem $file
     */
    public function __construct(Filesystem $file)
    {
        $this->file = $file;
    }

    /**
     * 3).
     * デフォルトを利用.
     * @param Filesystem $file
     *
    public function __construct(Filesystem $file = null)
    {
        $this->file = $file ?: new Filesystem();
    }
     */

    /**
     * @return int
     */
    public function output()
    {
        return $this->file->put('report.txt', 'report');
    }
}
