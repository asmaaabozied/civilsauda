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
                            <li class="breadcrumb-item active"><a> @lang('site.add') </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row" data-select2-id="14">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            @include('partials._errors')

                            <form action="{{ route('dashboard.citizens.store') }}" method="post"
                                  enctype="multipart/form-data">

                                {{ csrf_field() }}
                                {{ method_field('post') }}

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>@lang('site.first_name_ar')</label>
                                            <input type="text" name="first_name_ar" class="form-control"
                                                   value="{{ old('first_name_ar') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.second_name_ar')</label>
                                            <input type="text" name="second_name_ar" class="form-control"
                                                   value="{{ old('second_name_ar') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('site.third_name_ar')</label>
                                            <input type="text" name="third_name_ar" class="form-control"
                                                   value="{{ old('third_name_ar') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.fourth_name_ar')</label>
                                            <input type="text" name="fourth_name_ar" class="form-control"
                                                   value="{{ old('fourth_name_ar') }}" required>
                                        </div>


                                        <div class="form-group">
                                            <label>@lang('site.gender')</label>
                                            <select name="gender" class="form-control select2"
                                            required >
                                                  <option selected>@lang('site.select')</option>
                                                <option value="MALE">@lang('site.MALE')</option>
                                                <option value="FEMALE">@lang('site.FEMALE')</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('site.marital_status')</label>
                                            <select name="marital_status" class="form-control select2"
                                          required  >
                                                 <option selected>@lang('site.select')</option>
                                                <option value="MARRIED">@lang('site.MARRIED')</option>
                                                <option value="SINGLE">@lang('site.SINGLE')</option>
                                                <option value="DIVORCED">@lang('site.DIVORCED')</option>
                                                <option value="WIDOWED">@lang('site.WIDOWED')</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('site.birth_date')</label>
                                            <div id="result">
                                                <input type="date" name="birth_date" class="form-control date" required>


                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.place_of_birth')</label>
                                            <input type="text" name="place_of_birth"
                                                   class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('site.first_name_en')</label>
                                            <input type="text" name="first_name_en" class="form-control"
                                                   value="{{ old('first_name_en') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.second_name_en')</label>
                                            <input type="text" name="second_name_en" class="form-control"
                                                   value="{{ old('second_name_en') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('site.third_name_en')</label>
                                            <input type="text" name="third_name_en" class="form-control"
                                                   value="{{ old('third_name_en') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.fourth_name_en')</label>
                                            <input type="text" name="fourth_name_en" class="form-control"
                                                   value="{{ old('fourth_name_en') }}" required>
                                        </div>


                                        <div class="form-group">
                                            <label>@lang('site.mother_name_ar')</label>
                                            <input type="text" name="mother_name_ar" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.mother_name_en')</label>
                                            <input type="text" name="mother_name_en" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.phone')</label>
                                            <input type="text" name="phone" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.jobs')</label>
                                            <select name="job_id" class="form-control select2"
                                            >
                                             <option selected>@lang('site.select')</option>
                                                @foreach ($jobs as $job)
                                                    <option
                                                        value="{{ $job->id }}" {{ old('job_id') == $job->id ? 'selected' : '' }}>
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
                                                   value="{{ old('image') }}" required>


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
                                <div class="row">

                                    <div class="col-lg-4">

                                        <label>@lang('site.fullnamefirst')</label>
                                        <input type="text" name="fullname[]" class="form-control"
                                               value="{{ old('fullname') }}" required>


                                    </div>


                                    <div class="col-lg-4">
                                        <label>@lang('site.card_number')</label>
                                        <input type="text" name="card_number[]" class="form-control"
                                               value="{{ old('card_number') }}" required>

                                    </div>
                                    <div class="col-lg-4">

                                        <label>@lang('site.phone')</label>
                                        <input type="text" name="phones[]" class="form-control"
                                               value="{{ old('phone') }}" required>

                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-4">

                                        <label>@lang('site.fullnamesecond')</label>
                                        <input type="text" name="fullname[]" class="form-control"
                                               value="{{ old('fullname') }}">


                                    </div>


                                    <div class="col-lg-4">
                                        <label>@lang('site.card_number')</label>
                                        <input type="text" name="card_number[]" class="form-control"
                                               value="{{ old('card_number') }}">

                                    </div>
                                    <div class="col-lg-4">

                                        <label>@lang('site.phone')</label>
                                        <input type="text" name="phones[]" class="form-control"
                                               value="{{ old('phone') }}">

                                    </div>
                                </div>


                                <h4 class="card-title mt-4">@lang('site.addresses')</h4>
                                <div class="row">

                                    <div class="col-lg-4">

                                        <label>@lang('site.address')</label>
                                        <input type="text" name="address1" class="form-control"
                                               value="{{ old('address1') }}" required>


                                    </div>


                                    <div class="col-lg-4">
                                        <label>@lang('site.street')</label>
                                        <input type="text" name="street" class="form-control"
                                               value="{{ old('street') }}" required>

                                    </div>
                                    <div class="col-lg-4">

                                        <label>@lang('site.address2')</label>
                                        <input type="text" name="address2" class="form-control"
                                               value="{{ old('address2') }}">

                                    </div>
                                </div>
                                <div class="row">




                                    <div class="col-lg-4">
                                        <label>@lang('site.countries')</label>
                                        <select name="country_id" class="form-control select2"
                                        id="country_id" required >
                                     <option selected>@lang('site.select')</option>
                                            @foreach ($countries as $country)
                                                <option
                                                    value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-lg-4">
                                        <label>@lang('site.provinces')</label>
                                        <select name="province_id" class="form-control select2" id="province_id">



                                        </select>

                                    </div>

                                    <div class="col-lg-4">
                                        <label>@lang('site.cities')</label>
                                        <select name="city_id" class="form-control select2" id="city_id">



                                        </select>

                                    </div>

                                    <div class="col-lg-4">

                                        <label>@lang('site.code')</label>
                                        <input type="text" name="code" class="form-control"
                                               value="{{ old('code') }}">


                                    </div>
                                    <div class="col-lg-4">
                                        <label>@lang('site.tripes')</label>
                                        <select name="tribe_id" class="form-control select2" id="tribe_id" required>

                                     <option selected>@lang('site.select')</option>

                                            @foreach (\App\Models\Tribe::get() as $city)
                                                <option
                                                    value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                                    {{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-lg-4">
                                        <label>@lang('site.descents')</label>
                                        <select name="descent_id" class="form-control select2" id="descent_id" required>

                                         <option selected>@lang('site.select')</option>

                                            @foreach (\App\Models\Descent::get() as $city)
                                                <option
                                                    value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                                    {{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-lg-4">
                                        <label>@lang('site.arithmetic')</label>
                                        <select name="arithmetic_id" class="form-control select2" id="arithmetic_id" required>

                                    <option selected>@lang('site.select')</option>

                                            @foreach (\App\Models\Arithmetic::get() as $city)
                                                <option
                                                    value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                                    {{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-lg-4">
                                        <label>@lang('site.adjectives')</label>
                                        <select name="adjective_id" class="form-control select2" id="arithmetic_id" required>

                                   <option selected>@lang('site.select')</option>

                                            @foreach (\App\Models\Adjective::get() as $city)
                                                <option
                                                    value="{{ $city->id }}" {{ old('adjective_id') == $city->id ? 'selected' : '' }}>
                                                    {{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>

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
                                            @lang('site.add')</button>
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
