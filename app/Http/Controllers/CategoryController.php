<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function showNewCategoryForm()
  {
    return view('categories.new');
  }


  public function createNewCategory(Request $request)
  {
     $abbr = ucfirst(substr($request->name,0,1)) . \App\Category::getValidId();
    \App\Category::create([
      'name' => $request->name,
      'value' => $request->value,
      'abbr' => $abbr,
      'mandatory' => $request->man,
    ]);

    $message = "Category Added succesfully!";

    return view('categories.new', ['message' => $message]);
  }


  public function showCategories()
  {
    $categories = \App\Category::all();
    return view('categories.display', ['categories' => $categories]);
  }

  public function showChangeCategoryForm($id)
  {
    $category = \App\Category::find($id);

    return view('categories.change', ['category' => $category]);
  }

  public function changeCategory($id, Request $request)
  {
     $category = \App\Category::find($id);
     $category->name = $request->name;
     $category->value = $request->value;
     $category->mandatory = $request->man;
     $category->save();

     $message = "Category changed succesfully!";

     return view('categories.change', ['category' => $category, 'message' => $message]);

  }



  public function removeCategory($id)
  {
    $category = \App\Category::find($id);
    $category->delete();

    $message = "Category removed successfully!";
    $categories = \App\Category::all();


    return view('categories.display', ['categories' => $categories , 'message' => $message] );
  }
}
