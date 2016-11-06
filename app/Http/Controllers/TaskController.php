<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;

use App\Invoice;

use App\Tag;

use App\Category;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\CreateTaskRequest;


class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tasks = Task::with('createdBy', 'lastUpdateBy', 'invoices', 'tags.categories')->get();

        return View('tasks.index', compact('tasks') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tagCategories = Category::with('tags')->get();

        $invoices = Invoice::pluck('invoice_number', 'id');

        $task = new Task;

        return View('tasks.create', compact('task', 'tagCategories', 'invoices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTaskRequest $request)
    {
        $task = $this->createTask($request);

        return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return View('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tagCategories = Category::with('tags')->get();

        $invoices = Invoice::pluck('invoice_number', 'id');

        $task = Task::findOrFail($id);

        return View('tasks.edit', compact('task', 'tagCategories', 'invoices') );
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTaskRequest $request, $id)
    {
        $input = $request->all();

        $input['lastUpdateBy'] = Auth::user()->id;

        $task = Task::findOrFail($id);

        $task->update($input);

        $this->syncTags($task, $request->input('tag_list') );

        return redirect('tasks');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);

        return redirect('tasks'); 

    }

    /**
     * Sync the tags for a task
     * @param  Task   $task    
     * @param  Request $request 
     * @return empty          
     */
    private function syncTags(Task $task, $tags)
    {
        $task->tags()->sync( $tags );
    }

    /**
     * Create a new task
     * @param  Request $request 
     * @return Task $task       
     */
    
    private function createTask(Request $request)
    {
        $task = $request->all();

        $task['created_by'] = Auth::user()->id;
        $task['last_update_by'] = Auth::user()->id;
        
        $task = Task::create($task);

        $this->syncTags($task, $request->input('tag_list') );

        return $task;
    }
}
