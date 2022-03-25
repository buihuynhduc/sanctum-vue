<?php

namespace App\Http\Controllers;
use App\Models\book;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public function index()
    {
        $data =book::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new book();
        $book->bookname = $request->bookname;
        $book->description = $request->description;
        $book->category_id = $request->category_id;
        $book->save();
        return response()->json($book);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = book::findOrFail($id);
        return response()->json($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = book::findOrFail($id);
        $book->bookname = isset($request->bookname) ? $request->bookname : $book->bookname;
        $book->description = isset($request->description) ? $request->description : $book->description;
        $book->category_id = isset($request->category_id) ? $request->category_id : $book->category_id;
        $book->save();
        return response()->json($book, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = book::findOrFail($id);
        $book->delete();
        return response()->json([
            'Status' => 200,
            'Message' => 'xoa thanh cong',
        ]);
    }
}
