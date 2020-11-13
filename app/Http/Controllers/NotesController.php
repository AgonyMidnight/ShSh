<?php

namespace App\Http\Controllers;

use App\Models\NotesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */






    public function index()
    {
        $notes = DB::table('notes')->select('*')->get();
        return view('welcome',['date'=>$notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $allCategories = (new CategoryController)->index();
        return view('newNote',['all'=>$allCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $category = 0;

        if ($request->input('category_id') == 'add') {
            (new CategoryController())->store($request);
            $category = DB::table('categories')->select('id')->where('name', $request->input('newCategory'))->first();
            $category = $category->id;
        }
        else {
            $category = $request->input('category_id');
        }

        $request->validate([
            'title' => 'required|max:180',
            'description' => 'required',
            'category_id' => 'required',
            'imgFile' => 'image'
        ]);
        if ($request->hasFile('imgFile')) {
            $folder = date('Y-m-d');
            $image = $request->file('img')->store("images/{$folder}", "public");
        }
        DB::table('notes')->insert([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $category,
            'img' => $image ?? null
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotesModel  $notesModel
     * @return \Illuminate\Http\Response
     */
    public function show(NotesModel $notesModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotesModel  $notesModel
     * @return \Illuminate\Http\Response
     */
    public function edit(NotesModel $notesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotesModel  $notesModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotesModel $notesModel)
    {
        return view('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotesModel  $notesModel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function destroy($id)
    {
        DB::table('notes')->delete($id);
        return redirect('/Notes');
    }
}
