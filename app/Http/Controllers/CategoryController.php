<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.category.categoryList');
    }

    public function create($id=false)
    {
        if ($id){
            $data = Category::where('id',$id)->first();
        }else{
            $data = false;
        }
        return view('admin.category.addCategory',compact('data'));
    }

    public function store(Request $data)
    {
        $this->validate($data, [
            'categoryName' => 'required',
            'status' => 'required'
        ]);

        if (!empty($data->id))
            $category = Category::find($data->id);
        else
            $category = new Category;

            $category->categoryName = $data->categoryName;
            $category->status = $data->status;
            $category->save();

        return redirect('/category-list');
    }

    public function categoryTable(Request $data)
    {
        $category_data = Category::all();
        $datatables = DataTables::of($category_data);
        return $datatables->make(true);
    }
}
