<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.list',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'category-name' => 'required'
        ]);
       //  Store data in database
        $category = new Category([
            'name' => $request->input('category-name')
        ]);
        $category->save();
        return redirect()->route('category.list')->with("success","Tạo mới thành công.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Form validation
        $this->validate($request, [
            'category-name' => 'required'
        ]);
        $category = Category::find($id);
        //  Store data in database
        $category->name = $request->input('category-name');
        $category->save();
        return redirect()->route('category.list')->with("success","Cập nhật thành công.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $books = Book::all();
        foreach($books as $item){
            if($item['category_id'] == $category['category_id']){
                return redirect()->route('category.list')->with("invalid","Hiện đang có một số cuốn sách thuộc về danh mục này, bạn không thể xóa.");
            }
        }
        $category->delete();
        return redirect()->route('category.list')->with("success","Xóa thành công.");
    }
}
