<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Infrastracture\Db\TaskDao;
use Illuminate\Support\Facades\DB;

class TaskDaoTest extends TestCase
{
    public $sut;

    public function setUp()
    {
	$this->sut = new TaskDao();
    }

    public function testDelete()
    {
	$taskId = 1;
	$before = $this->sut->delete($taskId);
	$after = DB::table($this->sut->table)->where('id', $taskId)->delete();
   	return $this->assertEquals($before, $after);
    }	
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
        #$this->assertTrue(false);
    }
}
