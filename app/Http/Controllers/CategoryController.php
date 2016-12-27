<?php

namespace App\Http\Controllers;

use App\Task;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    /**
     * Check if user is authenticated
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Main categories menu
     *
     * @param  object $request Request object
     * @return Response
     */
    public function index(Request $request)
    {
        // get all categories belonging to the authenticated user
        $categories = Category::where('user_id', '=', Auth::id())->get();

        return view('home.home', [
            'categories' => $categories,
            'username' => Auth::user()->name
        ]);
    }

    /**
     * Show single category tasks
     *
     * @param  int $categoryId category id
     * @return Response
     */
    public function show($categoryId)
    {
        // get single category
        $category = Category::where('category_id', '=', $categoryId)
                            ->where('user_id', '=', Auth::id())
                            ->first();

        // get all tasks of the single category
        $tasks = Task::where('category_id', '=', $categoryId)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('category.show', [
            'category' => $category,
            'tasks' => $tasks
        ]);
    }

    /**
     * Edit category
     *
     * @param  object $category Category object
     * @return Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Create category
     *
     * @return Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Save / store category
     *
     * @param  object $request Request object
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|max:50',
            'category_desc' => 'required|max:200'
        ]);

        $categoryName = $request->category_name;

        $category = new Category;
        $category->user_id = Auth::id();
        $category->category_name = $categoryName;
        $category->category_desc = $request->category_desc;
        $category->save();

        return redirect()->route('home_category')->with('status',
            "Category $categoryName! has been successfully created!");
    }

    /**
     * Delete category
     *
     * @param  int $category category id
     * @return Response
     */
    public function delete($categoryId)
    {
        // get single category
        $category = Category::where('category_id', '=', $categoryId)
                            ->where('user_id', '=', Auth::id())
                            ->first();

        $categoryName = $category->category_name;

        $category->delete();

        return redirect()->route('home_category')->with('status',
            "Category $categoryName has been successfully deleted!");
    }

    /**
     * Update category
     *
     * @param  object  $request  Request object
     * @param  object $category  Category object
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->back();
    }
}
