<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\AdjectiveDatatables;
use App\DataTables\ArtimeticDatatables;
use App\DataTables\CountryDatatables;
use App\DataTables\DescentDatatables;
use App\Http\Controllers\Controller;
use App\Models\Adjective;
use App\Models\Arithmetic;
use App\Models\Descent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdjectiveDatatables $AdjectiveDatatables)
    {
        return $AdjectiveDatatables->render('dashboard.datatable', [
            'title' => trans('site.adjectives'),
            'model' => 'adjectives',
            'count' => $AdjectiveDatatables->count()
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.adjectives.create');

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

        Adjective::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.adjectives.index');

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
        $descent = Adjective::find($id);

        return view('dashboard.adjectives.edit', compact('descent'));

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
        $Descent = Adjective::find($id);
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',


        ]);


        $Descent->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.adjectives.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Descent = Adjective::find($id);
        $Descent->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }


}
