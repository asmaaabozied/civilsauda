<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CitizenDatatables;
use App\DataTables\UserDatatables;
use App\Models\Address;
use App\Models\Card;
use App\Models\Citizen;
use App\Models\City;
use App\Models\Country;
use App\Models\Finance;
use App\Models\Gurantor;
use App\Models\Job;
use App\Models\Province;
use App\User;
use App\Role;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Database\QueryException;
use Datatables;


class CitizenController extends Controller
{

    public function Report(CitizenDatatables $citizenDatatables){


        return $citizenDatatables->render('dashboard.citizendatatable', [
            'title' => trans('site.citizens'),
            'model' => 'citizens',
            'count' => $citizenDatatables->count()
        ]);

    }

    public function index(CitizenDatatables $citizenDatatables)
    {

        return $citizenDatatables->render('dashboard.datatable', [
            'title' => trans('site.citizens'),
            'model' => 'citizens',
            'count' => $citizenDatatables->count()
        ]);


    }//end of index

    public function ajax_country($id)
    {


        $cities = Province::where('country_id', '=', $id)->get();


        return Response::json($cities);


    }

    public function ajax_city($id){

        $provinces = City::where('province_id', '=', $id)->get();


        return Response::json($provinces);

    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $jobs = Job::all();
        return view('dashboard.citizens.create', compact('jobs', 'countries', 'cities'));
    }//end of create

    public function store(Request $request)
    {


        $request->validate([
            'first_name_ar' => 'required',
            'second_name_ar' => 'required',
            'third_name_ar' => 'required',
            'fourth_name_ar' => 'required',

            'first_name_en' => 'required',
            'second_name_en' => 'required',
            'third_name_en' => 'required',
            'fourth_name_en' => 'required',


            'gender' => 'required',
            'marital_status' => 'required',
            'birth_date' => 'required',
            'place_of_birth' => 'required',


            'mother_name_ar' => 'required',
            'mother_name_en' => 'required',
            'address1' => 'required',
            'street' => 'required',
            'tribe_id' => 'required',

        ]);

        $citizen = Citizen::create($request->except('fullname', 'phones', 'card_number', 'address1', 'street', 'address2', 'code', 'country_id', 'city_id'));
//upload image
        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(100, 100)->save(base_path('/uploads/' . $filename));
            $citizen->image = $filename;
            $citizen->save();
        }
        if ($request->hasFile('file_name')) {
            $thumbnails = $request->file('file_name');
            $filenames = time() . '.' . $thumbnails->getClientOriginalExtension();
            Image::make($thumbnails)->resize(100, 100)->save(base_path('/uploads/' . $filenames));
            $citizen->file_name = $filenames;
            $citizen->save();
        }


        Card::create([
            'card_number' => mt_rand(1000000000, 9999999999),
            'date_of_issue' => Carbon::now()->toDateTimeString(),
            'expiry_date' => Carbon::now()->addYear(),
            'citizen_id' => $citizen->id,
            'place_issue' => Auth::user()->branch->name ?? '',

        ]);


        Finance::create([
            'operation_id' => 1,
            'operation_type' => 'DEPOSIT',
            'status' => 'REVISION',
            'payment_type' => 'NO_PAID',
            'citizen_id' => $citizen->id,

        ]);

        //create addresses
        Address::create([
            'address1' => $request['address1'],
            'street' => $request['street'],
            'address2' => $request['address2'],
            'code' => $request['code'],
            'country_id' => $request['country_id'],
            'city_id' => $request['city_id'],
            'citizen_id' => $citizen->id

        ]);
        //create gurantors
        foreach ($request->fullname as $key => $value)

            Gurantor::create([

                'fullname' => $request['fullname'][$key],
                'card_number' => $request['card_number'][$key],
                'phone' => $request['phones'][$key],
                'citizen_id' => $citizen->id
            ]);

        session()->flash('success', __('site.added_successfullycode') . $citizen->id);
        return redirect()->route('dashboard.citizens.index');

    }//end of store

    public function edit($id)
    {

        $citizen = Citizen::find($id);

        $address = $citizen->addresses->first();
        $gurantors = $citizen->gurantors;

        $countries = Country::all();
        $cities = City::all();
        $jobs = Job::all();
        return view('dashboard.citizens.edit', compact('gurantors', 'address', 'citizen', 'jobs', 'countries', 'cities'));

    }//end of user

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name_ar' => 'required',
            'second_name_ar' => 'required',
            'third_name_ar' => 'required',
            'fourth_name_ar' => 'required',
            'first_name_en' => 'required',
            'second_name_en' => 'required',
            'third_name_en' => 'required',
            'fourth_name_en' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'birth_date' => 'required',
            'place_of_birth' => 'required',
            'mother_name_ar' => 'required',
            'mother_name_en' => 'required',
            'address1' => 'required',
            'street' => 'required',
            'tribe_id' => 'required',

        ]);

        $citizen = Citizen::find($id);

        $citizen->update($request->except('fullname', 'card_number', 'phone', 'address1', 'street', 'address2', 'code', 'country_id', 'city_id'));
        //upload image
        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(100, 100)->save(base_path('/uploads/' . $filename));
            $citizen->image = $filename;
            $citizen->save();
        }
        if ($request->hasFile('file_name')) {
            $thumbnails = $request->file('file_name');
            $filenames = time() . '.' . $thumbnails->getClientOriginalExtension();
            Image::make($thumbnails)->resize(100, 100)->save(base_path('/uploads/' . $filenames));
            $citizen->file_name = $filenames;
            $citizen->save();
        }
        //create addresses
        Address::updateOrCreate(['citizen_id' => $citizen->id], [
            'address1' => $request['address1'],
            'street' => $request['street'],
            'address2' => $request['address2'],
            'code' => $request['code'],
            'country_id' => $request['country_id'],
            'city_id' => $request['city_id'],
            'citizen_id' => $citizen->id

        ]);
        if (!empty($request->fullname))
            Gurantor::where('citizen_id', $citizen->id)->delete();
        //create gurantors
        foreach ($request->fullname as $key => $value)


            Gurantor::create([

                'fullname' => $request['fullname'][$key],
                'card_number' => $request['card_number'][$key],
                'phone' => $request['phone'][$key],
                'citizen_id' => $citizen->id
            ]);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.citizens.index');

    }//end of update

    public function show($id)
    {

        $citizen = Citizen::with(['tripe','descent','arithmetic','job','country','city'])->find($id);
        $address = $citizen->addresses->first();
        $gurantors = $citizen->gurantors->first();
        $countries = Country::all();
        $cities = City::all();
        $jobs = Job::all();
        return view('dashboard.citizens.show', compact('gurantors', 'address', 'citizen', 'jobs', 'countries', 'cities'));

    }

    public function destroy($id)
    {
        $citizen = Citizen::find($id);

        $citizen->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return back();

    }//end of destroy


}//end of controller
