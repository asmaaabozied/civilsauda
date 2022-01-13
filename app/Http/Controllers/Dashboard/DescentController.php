<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CountryDatatables;
use App\DataTables\DescentDatatables;
use App\Http\Controllers\Controller;
use App\Models\Descent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DescentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DescentDatatables $DescentDatatables)
    {
        return $DescentDatatables->render('dashboard.datatable', [
            'title' => trans('site.descents'),
            'model'=>'descents',
            'count' => $DescentDatatables->count()
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.descents.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',


        ]);

        Descent::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.descents.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $descent = Descent::find($id);

        return view('dashboard.descents.edit', compact('descent'));

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
        $Descent = Descent::find($id);
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',


        ]);


        $Descent->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.descents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Descent = Descent::find($id);
        $Descent->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }



}
