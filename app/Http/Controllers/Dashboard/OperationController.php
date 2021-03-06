<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CountryDatatables;
use App\DataTables\OperationDatatables;
use App\Http\Controllers\Controller;
use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OperationDatatables $operationDatatables)
    {
        return $operationDatatables->render('dashboard.datatable', [
            'title' => trans('site.operations'),
            'model' => 'operations',
            'count' => $operationDatatables->count()
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.operations.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Operation::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.operations.index');

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
        $operation = Operation::find($id);

        return view('dashboard.operations.edit', compact('operation'));

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
        $operation = Operation::find($id);



        $operation->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.operations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operation = Operation::find($id);
        $operation->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }



}
