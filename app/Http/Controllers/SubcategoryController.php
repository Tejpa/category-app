<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    public function index()
    {
      $subcat = DB::table('categories')
       ->select('id','name','parent_id')
       ->where('parent_id', '=' ,1)
       ->get();
       return view('subcategory.index',['subcat' => $subcat]);
    }
    public function create()
    {
       return view('subcategory.add');
    }
    
    public function store(Request $request)
    {
        $subcat = new Category;
        $subcat->name = $request->name;
        $subcat->parent_id = 1;
        $subcat->save();
        return response()->json(['success'=>'SubCategory added successfully!']);
    }
    public function edit($id)
    {
        $subcat = Category::find($id);
        return view('subcategory.edit',['subcat' => $subcat]);
    }
    public function update(Request $request, $id)
    {
        $subcat = DB::table('categories')
              ->where('id', $id)
              ->update(['name' => $request->name]);
        return response()->json(['success'=>'SubCategory updated successfully!']);
    }
    public function destroy($id)
    {
        $subcat = DB::table('categories')->where('id', '=', $id)->delete();
        return redirect()->back()->with(['success', 'SubCategory deleted!!']);
    }
}
