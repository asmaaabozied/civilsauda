<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ArtimeticDatatables;
use App\DataTables\CountryDatatables;
use App\DataTables\DescentDatatables;
use App\Http\Controllers\Controller;
use App\Models\Arithmetic;
use App\Models\Descent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArithmeticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ArtimeticDatatables $ArtimeticDatatables)
    {
        return $ArtimeticDatatables->render('dashboard.datatable', [
            'title' => trans('site.arithmetic'),
            'model'=>'arithmetic',
            'count' => $ArtimeticDatatables->count()
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.arithmetic.create');

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

        Arithmetic::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.arithmetic.index');

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
        $descent = Arithmetic::find($id);

        return view('dashboard.arithmetic.edit', compact('descent'));

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
        $Descent = Arithmetic::find($id);
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',


        ]);


        $Descent->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.arithmetic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Descent = Arithmetic::find($id);
        $Descent->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }



}
