<?php

namespace App\Composers;

use Illuminate\Contracts\View\View;

/**
 * Laravelの機能を使ってView Composer自体のテストも実行できます
 * Class BasicViewComposer
 */
class BasicViewComposer
{
    /**
     * Bind data to the view.
     * @param  View  $view
     */
    public function compose(View $view)
    {
        $view->with('variable', 'testing');
    }
}
