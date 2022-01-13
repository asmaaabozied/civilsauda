<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CountryDatatables;
use App\DataTables\FinanceDatatables;
use App\Http\Controllers\Controller;

use App\Models\Finance;
use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FinanceDatatables $financeDatatables)
    {

        return $financeDatatables->render('dashboard.datatable', [
            'title' => trans('site.finances'),
            'model' => 'finances',
            'count' => $financeDatatables->count()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Operations = Operation::all();
        return view('dashboard.finances.create', compact('Operations'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Finance::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.finances.index');

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
        $card = Finance::find($id);
        $Operations = Operation::all();
        return view('dashboard.finances.edit', compact('card', 'Operations'));

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
        $card = Finance::find($id);


        $card->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.finances.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = Finance::find($id);
        $card->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }


}
