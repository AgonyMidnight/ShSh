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

        $note = new NotesModel();
        $note->title = $request->input('title');
        $note->description = $request->input('description');
        $note->category_id = $category;
        if ($request->hasFile('imgFile')) {
            $folder = date('Y-m-d');
            $note->img = $request->file('imgFile')->store("images/{$folder}", "public");
        }
        $note->save();
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
    //public function edit(NotesModel $notesModel)
    public function edit($id)
    {
        $data = (new ChangeController())->index($id);
        return view('changeNote', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotesModel  $notesModel
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, NotesModel $notesModel)
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:180',
            'description' => 'required'
        ]);
        $note = NotesModel::find($id);
        $note->title = $request->input('title');
        $note->description = $request->input('description');
        $note->save();
        return redirect('/Notes');
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
