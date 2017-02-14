<?php
// 論理パス
namespace App\Http\Controllers;

// 論理パスで呼ぶ
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
//use App\Task;
use App\Infrastracture\Db\TaskDao;

class TaskController extends Controller
{
    /**
     * @var TaskRepository 
     */
    protected $tasks;
    //
//    public function __construct(TaskRepository $tasks) {
    public function __construct(TaskDao $taskDao) {
        $this->middleware('auth');
        $this->tasks = $taskDao;
    }
    
    public function index(Request $request) {
        return view('tasks.index', [
//            'tasks' => $this->tasks->forUser($request->user()),
            'tasks' => $this->tasks->getAllUser($request->user()->id),
        ]);
    }
    
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        
        $request->user()->tasks()->create([
           'name' => $request->name, 
        ]);
        
        return redirect('/tasks');
    }
    
//    public function destroy(Request $request, Task $task) {
    // Laravel DIでググる。ここで勝手に引数の型をTask -> TaskDaoに変えてる。それでも問題なく動く。これがDI。疎結合に作れるらしい。
    public function destroy(Request $request, TaskDao $task, $taskId) {
//        var_dump("aaaaaaaaa");exit();
        $task->delete($taskId);
        return redirect('/tasks');
    }
}
