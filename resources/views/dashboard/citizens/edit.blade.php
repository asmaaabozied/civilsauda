@extends('layouts.dashboard.app')

@section('content')
    <div class="page-wrapper" style="min-height: 422px;" data-select2-id="16">
        <div class="content container-fluid" data-select2-id="15">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">@lang('site.citizens')</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</li>
                            <li class="breadcrumb-item"><a
                                    hhref="{{ route('dashboard.citizens.index') }}"> @lang('site.citizens') </a></li>
                            <li class="breadcrumb-item active"><a> @lang('site.edit') </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row" data-select2-id="14">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic Info</h4>
                            @include('partials._errors')


                                <form
                                    action="{{ route('dashboard.citizens.update', $citizen->id) }}"
                                    method="post"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('put') }}

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>@lang('site.first_name_ar')</label>
                                            <input type="text" name="first_name_ar" class="form-control"
                                                   value="{{ $citizen->first_name_ar }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.second_name_ar')</label>
                                            <input type="text" name="second_name_ar" class="form-control"
                                                   value="{{ $citizen->second_name_ar }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('site.third_name_ar')</label>
                                            <input type="text" name="third_name_ar" class="form-control"
                                                   value="{{ $citizen->third_name_ar }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.fourth_name_ar')</label>
                                            <input type="text" name="fourth_name_ar" class="form-control"
                                                   value="{{ $citizen->fourth_name_ar }}" required>
                                        </div>


                                        <div class="form-group">
                                            <label>@lang('site.gender')</label>
                                            <select name="gender" class="form-control select2"
                                         required   >
                                                <option value="MALE">@lang('site.MALE')</option><option value="FEMALE">@lang('site.FEMALE')</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('site.marital_status')</label>
                                            <select name="marital_status" class="form-control select2"
                                         required   >
                                                <option value="MARRIED"  {{ $citizen->marital_status =='MARRIED' ? 'selected' : '' }}>@lang('site.MARRIED')</option>
                                                <option value="SINGLE"  {{ $citizen->marital_status =='SINGLE' ? 'selected' : '' }}>@lang('site.SINGLE')</option>
                                                <option value="DIVORCED" {{ $citizen->marital_status =='DIVORCED' ? 'selected' : '' }}>@lang('site.DIVORCED')</option>
                                                <option value="WIDOWED" {{ $citizen->marital_status =='WIDOWED' ? 'selected' : '' }}>@lang('site.WIDOWED')</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('site.birth_date')</label>
                                            <div id="result">
                                                <input type="date"   value="{{ $citizen->birth_date }}" name="birth_date" class="form-control date" required>


                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.place_of_birth')</label>
                                            <input type="text" name="place_of_birth"
                                                   class="form-control" value="{{ $citizen->place_of_birth }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('site.first_name_en')</label>
                                            <input type="text" name="first_name_en" class="form-control"
                                                   value="{{ $citizen->first_name_en }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.second_name_en')</label>
                                            <input type="text" name="second_name_en" class="form-control"
                                                   value="{{ $citizen->second_name_en }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('site.third_name_en')</label>
                                            <input type="text" name="third_name_en" class="form-control"
                                                   value="{{ $citizen->third_name_en }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.fourth_name_en')</label>
                                            <input type="text" name="fourth_name_en" class="form-control"
                                                   value="{{ $citizen->fourth_name_en }}" required>
                                        </div>


                                        <div class="form-group">
                                            <label>@lang('site.mother_name_ar')</label>
                                            <input type="text" name="mother_name_ar" class="form-control" value="{{ $citizen->mother_name_ar }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.mother_name_en')</label>
                                            <input type="text" name="mother_name_en" class="form-control"  value="{{ $citizen->mother_name_en }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.phone')</label>
                                            <input type="text" name="phone" class="form-control"  value="{{ $citizen->phone }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('site.jobs')</label>
                                            <select name="job_id" class="form-control select2"
                                           required >
                                            <!-- <option value="">@lang('site.jobs')</option> -->
                                                @foreach ($jobs as $job)
                                                    <option
                                                        value="{{ $job->id }}" {{ $citizen->job_id == $job->id ? 'selected' : '' }}>
                                                        {{ $job->name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                    <h4 class="card-title mt-4">@lang('site.image')</h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">


                                                <label>@lang('site.image')</label>
                                                <input type="file" name="image" class="form-control"
                                                       value="{{ old('image') }}" >


                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">


                                                <label>@lang('site.file')</label>
                                                <input type="file" name="file_name" class="form-control"
                                                       value="{{ old('file_name') }}" required>


                                            </div>


                                        </div>

                                    </div>

                                    <h4 class="card-title mt-4">@lang('site.gurantors')</h4>

                                    @foreach($gurantors as $value)
                                    <div class="row">

                                        <div class="col-lg-4">

                                            <label>@lang('site.fullnamefirst')</label>
                                            <input type="text" name="fullname[]" class="form-control"
                                                   value="{{ $value->fullname }}" required>


                                        </div>


                                        <div class="col-lg-4">
                                            <label>@lang('site.card_number')</label>
                                            <input type="text" name="card_number[]" class="form-control"
                                                   value="{{ $value->card_number }}" required>

                                        </div>
                                        <div class="col-lg-4">

                                            <label>@lang('site.phone')</label>
                                            <input type="text" name="phone[]" class="form-control"
                                                   value="{{ $value->phone }}" required>

                                        </div>
                                    </div>
                                    @endforeach
{{--                                    <div class="row">--}}

{{--                                        <div class="col-lg-4">--}}

{{--                                            <label>@lang('site.fullnamesecond')</label>--}}
{{--                                            <input type="text" name="fullname[]" class="form-control"--}}
{{--                                                   value="{{ old('fullname') }}">--}}


{{--                                        </div>--}}


{{--                                        <div class="col-lg-4">--}}
{{--                                            <label>@lang('site.card_number')</label>--}}
{{--                                            <input type="text" name="card_number[]" class="form-control"--}}
{{--                                                   value="{{ old('card_number') }}">--}}

{{--                                        </div>--}}
{{--                                        <div class="col-lg-4">--}}

{{--                                            <label>@lang('site.phone')</label>--}}
{{--                                            <input type="text" name="phone[]" class="form-control"--}}
{{--                                                   value="{{ old('phone') }}">--}}

{{--                                        </div>--}}
{{--                                    </div>--}}


                                    <h4 class="card-title mt-4">@lang('site.addresses')</h4>
                                    <div class="row">

                                        <div class="col-lg-4">

                                            <label>@lang('site.address')</label>
                                            <input type="text" name="address1" class="form-control"
                                                   value="{{ $address->address1}}" required>


                                        </div>


                                        <div class="col-lg-4">
                                            <label>@lang('site.street')</label>
                                            <input type="text" name="street" class="form-control"
                                                   value="{{ $address->street}}" required>

                                        </div>
                                        <div class="col-lg-4">

                                            <label>@lang('site.address2')</label>
                                            <input type="text" name="address2" class="form-control"
                                                   value="{{ $address->address2}}">

                                        </div>
                                    </div>
                                    <div class="row">


                                        <div class="col-lg-4">
                                            <label>@lang('site.countries')</label>
                                            <select name="country_id" class="form-control select2"
                                          required  id="country_id" >

                                                @foreach ($countries as $country)
                                                    <option
                                                        value="{{ $country->id }}" {{ $address->country_id == $country->id ? 'selected' : '' }}>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>


                                        <div class="col-lg-4">
                                            <label>@lang('site.provinces')</label>
                                            <select name="province_id" class="form-control select2" id="province_id">
                                                @foreach (\App\Models\Province::all() as $province)
                                                    <option
                                                        value="{{ $province->id }}" {{$address->province_id == $province->id ? 'selected' : '' }}>
                                                        {{ $province->name }}
                                                    </option>
                                                @endforeach


                                            </select>

                                        </div>

                                        <div class="col-lg-4">
                                            <label>@lang('site.cities')</label>
                                            <select name="city_id" class="form-control select2" id="city_id">

                                                @foreach ($cities as $city)
                                                    <option
                                                        value="{{ $city->id }}" {{$address->city_id == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                        </div>


                                        <div class="col-lg-4">

                                            <label>@lang('site.code')</label>
                                            <input type="text" name="code" class="form-control"
                                                   value="{{ $address->code}}">


                                        </div>
                                        <div class="col-lg-4">
                                            <label>@lang('site.tripes')</label>
                                            <select name="tribe_id" class="form-control select2" id="tribe_id" required>



                                                @foreach (\App\Models\Tribe::get() as $city)
                                                    <option
                                                        value="{{ $city->id }}" {{ $address->tribe_id == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col-lg-4">
                                            <label>@lang('site.descents')</label>
                                            <select name="descent_id" class="form-control select2" id="descent_id" required>



                                                @foreach (\App\Models\Descent::get() as $city)
                                                    <option
                                                        value="{{ $city->id }}" {{ $citizen->descent_id == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-lg-4">
                                            <label>@lang('site.arithmetic')</label>
                                            <select name="arithmetic_id" class="form-control select2" id="arithmetic_id" required>



                                                @foreach (\App\Models\Arithmetic::get() as $city)
                                                    <option
                                                        value="{{ $city->id }}" {{ $citizen->arithmetic_id == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-lg-4">
                                            <label>@lang('site.adjectives')</label>
                                            <select name="adjective_id" class="form-control select2" id="arithmetic_id" required>



                                                @foreach (\App\Models\Adjective::get() as $city)
                                                    <option
                                                        value="{{ $city->id }}" {{ $citizen->adjective_id == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    </div>




                                <div class="text-end mt-4">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                            <i class="fa fa-backward"></i> @lang('site.back')
                                        </button>
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-plus"></i>
                                            @lang('site.edit')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script>

        $('#country_id').on('change',function(e){
            var typeId = e.target.value;
            $.get("{{url('dashboard/ajax_country')}}/"+typeId, function(data){
                $('#province_id').empty();
                $('#province_id').append('<option>             </option>');
                $.each(data, function(index, course){
                    $('#province_id').append('<option value="'+course.id+'">'+course.name_ar+'</option>')
                });
            })
        }) ,


            $('#province_id').on('change',function(e){
                var typeId = e.target.value;
                $.get("{{url('dashboard/ajax_city')}}/"+typeId, function(data){
                    $('#city_id').empty();
                    $('#city_id').append('<option>             </option>');
                    $.each(data, function(index, course){
                        $('#city_id').append('<option value="'+course.id+'">'+course.name_ar+'</option>')
                    });
                })
            })
    </script>
@endsection
