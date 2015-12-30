<?php

/**
 * Class MigrationTest
 */
class MigrationTest extends TestCase
{

    /**
     * @before
     */
    public function setDatabase()
    {
        \File::put(storage_path('database.sqlite'), null);
        $this->artisan('migrate', ['--database' => 'sqlite']);
    }

    public function tearDown()
    {
        \File::delete(storage_path('database.sqlite'));
    }

    public function testTableCreate()
    {
        $sqlite = \DB::connection('sqlite');
        $result = $sqlite->table('sqlite_master')
            ->where('type', 'table')
            ->where('name', 'tests')->first();
        $this->assertEquals("tests", $result->name);
        $datetime = \Carbon\Carbon::now()->toDateTimeString();
        $id = $sqlite->table('tests')->insertGetId(
            [
                'title' => 'testing',
                'created_at' => $datetime,
                'updated_at' => $datetime
            ]
        );
        $find = $sqlite->table('tests')->where('id', $id)->first();
        $this->assertEquals('testing', $find->title);
    }

}
