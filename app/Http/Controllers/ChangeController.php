<?php

namespace App\Http\Controllers;

use App\Models\Change;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object
     */
    public function index($id)
    {
        return DB::table('notes')->select('*')->where('id', $id)->first();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Change  $change
     * @return \Illuminate\Http\Response
     */
    public function show(Change $change)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Change  $change
     * @return \Illuminate\Http\Response
     */
    public function edit(Change $change)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Change  $change
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Change $change)
    public function update($id)
    {
        echo "fhfjf";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Change  $change
     * @return \Illuminate\Http\Response
     */
    public function destroy(Change $change)
    {
        //
    }
}
