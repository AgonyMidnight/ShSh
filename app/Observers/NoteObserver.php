<?php

namespace App\Observers;

use App\Http\Controllers\CategoryController;
use App\Models\NotesModel;
use Illuminate\Support\Facades\DB;

class NoteObserver
{
    /**
     * Handle the NotesModel "created" event.
     *
     * @param  \App\Models\NotesModel  $notesModel
     * @return void
     */
    public function created(NotesModel $notesModel)
    {

    }
    public function creating (NotesModel $note)
    {
        $category= null;
        if (request()->input('category_id') == 'add') {
            (new CategoryController())->store(request());
            $category = DB::table('categories')->select('id')->where('name', request()->input('newCategory'))->first();
            $category = $category->id;
        }
        else {
            $category = request()->input('category_id');
        }
        $note->title = request()->input('title');
        $note->description = request()->input('description');
        $note->category_id = $category;
        if (request()->hasFile('imgFile')) {
            $folder = date('Y-m-d');
            $note->img = request()->file('imgFile')->store("images/{$folder}", "public");
        }
    }
    /**
     * Handle the NotesModel "updated" event.
     *
     * @param  \App\Models\NotesModel  $notesModel
     * @return void
     */
    public function updated(NotesModel $notesModel)
    {
        //
    }

    /**
     * Handle the NotesModel "deleted" event.
     *
     * @param  \App\Models\NotesModel  $notesModel
     * @return void
     */
    public function deleted(NotesModel $notesModel)
    {
        //
    }

    /**
     * Handle the NotesModel "restored" event.
     *
     * @param  \App\Models\NotesModel  $notesModel
     * @return void
     */
    public function restored(NotesModel $notesModel)
    {
        //
    }

    /**
     * Handle the NotesModel "force deleted" event.
     *
     * @param  \App\Models\NotesModel  $notesModel
     * @return void
     */
    public function forceDeleted(NotesModel $notesModel)
    {
        //
    }
}
