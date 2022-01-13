<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CityDatatables;
use App\DataTables\TribeDatatable;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Tribe;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TripeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TribeDatatable $citiesDatatables)
    {


        return $citiesDatatables->render('dashboard.datatable', [
            'title' => trans('site.tripes'),
            'model'=>'tripes',
            'count' => $citiesDatatables->count()
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        return view('dashboard.tripes.create');

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

            'code' => 'required|unique:tribes,code'



        ]);

        Tribe::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.tripes.index');

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
        $city = Tribe::find($id);



        return view('dashboard.tripes.edit', compact('city'));

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
        $city = Tribe::find($id);
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'code' => 'required'

        ]);


        $city->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.tripes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = Tribe::find($id);
        $city->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }



}
