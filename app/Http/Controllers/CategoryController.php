<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\CategoryExport;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $category = Category::create([
        //     'name' => 'acer', 'description' => 'Mô tả acer'
        // ]);
        // $category->save();
        $categories = Category::get();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return Str::slug('Xé gió', '-');
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request->slug;
        // $data = $request->all();
        // $category = Category::create($data); // need fillable in model

        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        
        $slug = $request->slug;
        // // check exists slug
        // while(Category::where('slug', $slug)->exists()){
        //     $slug = $slug.'-'.rand(1,100);
        // }
        $category->slug = $slug;
        $category->save();

        return redirect()->route('category.index')->with(['alert' => [
            'type' => 'success',
            'title' => 'Successful',
            'content' => 'Added new category.'
          ]]);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $id)
    {
        // return $id;
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('category.index')->with(['alert' => [
            'type' => 'success',
            'title' => 'Successful',
            'content' => 'Updated new category.'
          ]]);
              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // return $request;
        $category = Category::findOrFail($id);
        $alert ='';
        try{
            $category->delete();
            $alert = [
                'type' => 'success',
                'title' => 'Successful',
                'content' => 'Deleted category!'
            ];
        }
        catch(\Exception $e){
            $alert = [
                'type' => 'error',
                'title' => 'Failed',
                'content' => "Can't delete category"
            ];
        }
    }

    public function export(Request $request){
        // return 'ok';
        // $categories = Category::all();
        // return redirect()->route('category.index')->with(['alert' => [
        //     'type' => 'warning',
        //     'title' => 'Please wait...',
        //     'content' => 'Export is processing'
        //   ]]);
        return (new CategoryExport())->download('categories.xlsx');
        
    }
}
