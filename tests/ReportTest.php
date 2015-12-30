<?php

/**
 * Class ReportTest
 *
 * このテストはフレームワークに依存しないテストのため、
 * \TestCaseクラスは継承していません
 *
 * @see \App\Report
 */
class ReportTest extends \PHPUnit_Framework_TestCase
{
    /** @var \App\Report  */
    protected $report;

    protected function tearDown()
    {
        \Mockery::close();
    }

    /**
     * リスト6.18：簡単なテストコード
     * リスト6.19：Filesystem クラスをモックしたテストコード
     * は書籍を参照ください
     *
     * リスト6.20：戻り値をシミュレート
     */
    public function testOutput()
    {
        // ファイル内に書き込まれる文字の長さをテスト
        $filesystemMock = \Mockery::mock('Illuminate\Filesystem\Filesystem');
        $content = 'report';
        $filesystemMock->shouldReceive('put')->with('report.txt', $content)
            ->once()->andReturn(mb_strlen($content));
        $report = new \App\Report($filesystemMock);
        $this->assertSame(6, $report->output());
    }
}
