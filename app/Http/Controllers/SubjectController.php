<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Book;
use App\Models\SubjectBook;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subject.list',['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::join('category','category.category_id','=','book.category_id')->get(['book.*','category.name AS category_name']);
        return view('admin.subject.create',['books' => $books]);
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
            'subject-name' => 'required'
        ]);
        //  Store data in database
        $subject = new Subject([
            'name' => $request->input('subject-name')
        ]);
        $subject->save();
        $bookIds = $request->input('book_ids');
        if(!is_null($bookIds)){
            $bookArr = explode(',', rtrim($bookIds, ','));
        }
        if(isset($bookArr)){
            foreach($bookArr as $item){
                $bookSubject = SubjectBook::create([
                    'book_id' => $item,
                    'subject_id'  => $subject['subject_id']
                ]);
                $bookSubject->save();
            }
        }
        return redirect()->route('subject.list')->with("success","Tạo mới thành công.");
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
        $data = [];
        $subject = Subject::find($id);
        $book = SubjectBook::where('subject_id',$id)->get();
        foreach($book as $item){
            $data[] = $item['book_id'];
        }
        $books = Book::join('category','category.category_id','=','book.category_id')->get(['book.*','category.name AS category_name']);
        return view('admin.subject.edit',['subject' => $subject,'book' => $data,'books' => $books]);
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
        $subject = Subject::find($id);
        $subject->name = $request->input('subject-name');
        $subject->save();
        $bookIds = $request->input('book_ids');
        if(!is_null($bookIds)){
            $bookArr = explode(',', rtrim($bookIds, ','));
        }
        SubjectBook::where('subject_id','=',$id)->delete();
        if(isset($bookArr)){
            foreach($bookArr as $item){
                if(!empty($item)){
                    $bookSubject = SubjectBook::create([
                        'book_id' => $item,
                        'subject_id'  => $subject['subject_id']
                    ]);
                    $bookSubject->save();
                }
            }
        }
        return redirect()->route('subject.list')->with("success","Cập nhật thành công.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route('subject.list')->with("success","Xóa thành công.");
    }
}
