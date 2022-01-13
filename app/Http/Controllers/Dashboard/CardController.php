<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CardDatatables;
use App\DataTables\CountryDatatables;
use App\Http\Controllers\Controller;

use App\Models\Card;
use App\Models\Citizen;
use App\Models\Finance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CardDatatables $cardDatatables)
    {
        return $cardDatatables->render('dashboard.datatable', [
            'title' => trans('site.cards'),
            'model' => 'cards',
            'count' => $cardDatatables->count()
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citizens = Citizen::all();
        return view('dashboard.cards.create', compact('citizens'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Card::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.cards.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $card = Card::with('citizen')->find($id);
        if ($card->citizen->Finances->first()->payment_type == 'NO_PAID') {
            session()->flash('success', __('site.NoPayment'));
            return redirect()->route('dashboard.cards.index');

        } else {
            $citizens = Citizen::all();
            return view('dashboard.cards.show', compact('card', 'citizens'));
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = Card::find($id);
        $citizens = Citizen::all();
        return view('dashboard.cards.edit', compact('card', 'citizens'));

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
        $card = Card::find($id);


        $card->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.cards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = Card::find($id);
        $card->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }


}
