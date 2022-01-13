<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\BranchDatatables;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\City;
use App\Models\Country;
use App\Models\Tribe;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BranchDatatables $citiesDatatables)
    {


        return $citiesDatatables->render('dashboard.datatable', [
            'title' => trans('site.branches'),
            'model' => 'branches',
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


        return view('dashboard.branches.create');

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
            'phone' => 'required',


        ]);

        Branch::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.branches.index');

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
        $city = Branch::find($id);

        return view('dashboard.branches.edit', compact('city'));

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
        $city = Branch::find($id);
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'phone' => 'required',

        ]);


        $city->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.branches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = Branch::find($id);
        $city->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }


}
