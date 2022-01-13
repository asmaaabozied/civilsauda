<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CityDatatables;
use App\DataTables\ProvinceDatatables;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProvinceDatatables $citiesDatatables)
    {


        return $citiesDatatables->render('dashboard.datatable', [
            'title' => trans('site.provinces'),
            'model'=>'provinces',
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
        $countries = Country::get()->pluck('name', 'id');


        return view('dashboard.provinces.create', compact('countries'));

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

            'country_id' => 'required',


        ]);

        Province::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.provinces.index');

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
        $city = Province::find($id);

        $countries = Country::get()->pluck('name', 'id');

        return view('dashboard.provinces.edit', compact('city', 'countries'));

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
        $city = Province::find($id);
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',

            'country_id' => 'required',

        ]);


        $city->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.provinces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = Province::find($id);
        $city->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }



}
