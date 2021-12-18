<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Rules\FilterRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    protected $rules = [
        'title' => 'required|string|max:255|min:3',
        'titleAr' => 'required|string|max:255|min:3',
        'description' => 'required|string|min:3',
        'descriptionAr' => 'required|string|min:3',
    ];



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $parents = Category::all();
        $category = new Category;
        return view('categories.create', compact('category', 'parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clean = $request->validate($this->rules());
        // $request->create();
        // dd($request->title);
        $data = [
            'title' => $request->title,
            'titleAr' => $request->titleAr,
            'description' => $request->description,
            'descriptionAr' => $request->descriptionAr,
            'time' => $request->time,
        ];
        Category::create($data);
        // dd($request->all(), $data);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        // $Category = 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::findOrFail($id);

        $parents = Category::all();
        return view('categories.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $clean = $request->validate($this->rules());
        $request->except(['_method', '_token']);

        $category->update($request->all());


        return redirect()->route('/');
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::findorfail($id)->delete();

        return redirect('/');

    }

    protected function rules()
    {
        $rules = $this->rules;

        return $rules;
    }
}
