<?php

use App\Composers\BasicViewComposer;

/**
 * Class BasicViewComposerTest
 *
 * @see \App\Composers\BasicViewComposer
 */
class BasicViewComposerTest extends \TestCase
{
    /**
     * View Composerの機能をテストするにあたって、
     * 利用するViewテンプレートのパスを追加し、実行しています
     *
     * テンプレートのコンパイルファイル(storage/framework/views配下)の出力先を変更することも可能です
     */
    public function testCompose()
    {
        $factory = app('Illuminate\Contracts\View\Factory');
        $factory->addLocation(base_path('tests/resources/views'));
        $factory->composer('test', BasicViewComposer::class);
        $response = new \Illuminate\Http\Response($factory->make('test'));
        $this->assertArrayHasKey('variable', $response->original->getData());
    }
}
