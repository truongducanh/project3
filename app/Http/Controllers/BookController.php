<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::join('category','category.category_id','=','book.category_id')->get(['book.*','category.name AS category_name']);
        return view('admin.book.list',['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.book.create',['categories' => $categories]);
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
            'book-name' => 'required',
            'category_id' => 'required',
            'qty' => 'required'
        ]);
       //  Store data in database
        $book = new Book([
            'name' => $request->input('book-name'),
            'qty' => $request->input('qty'),
            'category_id' => $request->input('category_id')
        ]);
        $book->save();
        return redirect()->route('book.list')->with("success","Tạo mới thành công.");
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
        $book = Book::find($id);
        $categories = Category::all();
        return view('admin.book.edit',['book' => $book,'categories' => $categories]);
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
            'book-name' => 'required',
            'category_id' => 'required',
            'qty' => 'required'
        ]);
       //  Store data in database
        $book = Book::find($id);
        $book->name = $request->input('book-name');
        $book->category_id = $request->input('category_id');
        $book->qty = $request->input('qty');
        $book->save();
        return redirect()->route('book.list')->with("success","Cập nhật thành công.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
