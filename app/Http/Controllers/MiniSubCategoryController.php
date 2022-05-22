<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class MiniSubCategoryController extends Controller
{
    public function index()
    {
      $minicat = DB::table('categories')
       ->select('id','name','parent_id')
       ->where('parent_id', '=' ,2)
       ->get();
       return view('minisubcategory.index',['minicat' => $minicat]);
    }
    public function create()
    {
       return view('minisubcategory.add');
    }
    public function store(Request $request)
    {
        $minicat = new Category;
        $minicat->name = $request->name;
        $minicat->parent_id = 2;
        $minicat->save();
        return response()->json(['success'=>'MiniSubCategory added successfully!']);
    }
    public function edit($id)
    {
        $minicat = Category::find($id);
        return view('minisubcategory.edit',['minicat' => $minicat]);
    }
    public function update(Request $request, $id)
    {
        $subcat = DB::table('categories')
              ->where('id', $id)
              ->update(['name' => $request->name]);
        return response()->json(['success'=>'MiniSubCategory updated successfully!']);
    }
    public function destroy($id)
    {
        $subcat = DB::table('categories')->where('id', '=', $id)->delete();
        return redirect()->back()->with(['success', 'MiniSubCategory deleted!!']);
    }
}
