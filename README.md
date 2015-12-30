# Laravelリファレンス 6章テスト

[![Build Status](http://img.shields.io/travis/laravel-jp-reference/chapter6/master.svg?style=flat-square)](https://travis-ci.org/laravel-jp-reference/chapter6)
[![StyleCI](https://styleci.io/repos/48643478/shield)](https://styleci.io/repos/48643478)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/laravel-jp-reference/chapter6/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/laravel-jp-reference/chapter6/?branch=master)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/laravel-jp-reference/chapter6/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/laravel-jp-reference/chapter6/?branch=master)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/49d68b09-33d6-40c4-92a8-b6b2a2b58422.svg?style=flat-square)](https://insight.sensiolabs.com/projects/49d68b09-33d6-40c4-92a8-b6b2a2b58422)

[![GitHub license](https://img.shields.io/github/license/laravel-jp-reference/chapter6.svg?style=flat-square)](https://github.com/laravel-jp-reference/chapter6/blob/master/LICENSE)
[![GitHub license](https://img.shields.io/badge/laravel--jp--reference-chapter6-orange.svg?style=flat-square)](https://github.com/laravel-jp-reference/chapter6)

## このリポジトリについて
このリポジトリはImpress社から発行されている、  
[「Laravelリファレンス」](http://book.impress.co.jp/books/1114101107)の「6章テスト(P.289)」で扱っているテストコードが記述されています。

## 利用方法
### サンプルコードのダウンロード
gitコマンドを用いてサンプルコードをダウンロードします。

```bash
$ git clone https://github.com/laravel-jp-reference/chapter6.git 展開ディレクトリ名
```

またはImpressからサンプルコードをダウンロードすることができます。

### ライブラリのインストール
Composerを用いて、Laravel本体と動作に必要な依存ライブラリをインストールします。  

```bash
$ composer install
# もしくは
$ composer update
```

### .envファイルの設置
.env/exampleファイルをコピーし、`artisan key:generate`コマンドを実行します

```bash
$ cp .env.example .env
$ php artisan key:generate
```

## テストの実行
テストの実行方法は書籍内で紹介されています

## LICENSE
The code for laravel-jp-reference/chapter6 is distributed under the terms of the MIT license.
