<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
| モデルファクトリを利用して、データベースのダミーデータを作成します。
| 「Laravelリファレンス」書籍内では、モデルファクトリを利用して実際のデータベースへダミーデータを挿入するパターンと、
| データベースを利用せずにダミーデータを利用する2パターンを取り扱っています。
|
*/
/** @var Illuminate\Database\Eloquent\Factory $factory */
// EloquentORMを利用する\App\Userクラスのデータを生成します
$factory->define(\App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

// EloquentORMを利用する\App\Userクラスのデータを'guest'と識別子をつけて生成します
$factory->defineAs(\App\User::class, 'guest', function (Faker\Generator $faker) {
    return [
        'name' => 'guest',
        'email' => null,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

// EloquentORMを利用する\App\Entryクラスのデータを生成します
$factory->define(\App\Entry::class, function (Faker\Generator $faker) {
    /**
     * リスト6.42：日本語のダミーデータを生成
     * 日本語のダミーデータを生成するように言語環境を変更します
     */
    $faker = Faker\Factory::create('ja_JP');
    return [
        'title' => $faker->word,
        'content' => $faker->text,
    ];
});
