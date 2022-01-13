@extends('layouts.dashboard.app')

@section('content')

    <div class="page-wrapper" style="min-height: 422px;" data-select2-id="16">
        <div class="content container-fluid" data-select2-id="15">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">@lang('site.finances')</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</li>
                            <li class="breadcrumb-item"><a
                                    hhref="{{ route('dashboard.finances.index') }}"> @lang('site.finances') </a></li>
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
                            <h4 class="card-title">@lang('site.finances')</h4>
                            @include('partials._errors')

                            <form
                                action="{{ route('dashboard.finances.update', $card->id) }}"
                                method="post"
                                enctype="multipart/form-data">

                                {{ csrf_field() }}
                                {{ method_field('put') }}


                                <div class="row">


                                    <div class="col-md-6">

                                        <div class="form-group">


                                            <label>@lang('site.operations')</label>
                                            <select name="operation_id" class="form-control select2">
                                                <option value="">@lang('site.select')</option>
                                                @foreach ($Operations as $citizen)
                                                    <option
                                                        value="{{$citizen->id}}" {{ $card->operation_id== $citizen->id? 'selected' : '' }}>
                                                        {{ $citizen->name_ar}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">


                                            <label>@lang('site.price')</label>
                                            <input type="text" name="price" value="{{$card->operation->price}}"
                                                   class="form-control">
                                        </div>


                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">


                                            <label>@lang('site.payment')</label>
                                            <select name="payment_type" class="form-control select2">
                                                <option value="">@lang('site.select')</option>
                                                <option
                                                    value="PAID" {{ $card->payment_type=='PAID'? 'selected' : '' }}>@lang('site.PAID')</option>
                                                <option
                                                    value="NO_PAID" {{ $card->payment_type=='NO_PAID'? 'selected' : '' }}>@lang('site.NO_PAID')</option>
                                            </select>
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">


                                            <label>@lang('site.citizens')</label>
                                            <input type="text" value="{{$card->citizen->first_name ?? ''}}"
                                                   class="form-control">
                                            {{--                                            <select name="citizen_id" class="form-control select2">--}}
                                            {{--                                                <option value="">@lang('site.select')</option>--}}
                                            {{--                                                @foreach (\App\Models\Citizen::get() as $key=>$citizen)--}}
                                            {{--                                                    <option--}}
                                            {{--                                                        value="{{$key}}"  >--}}
                                            {{--                                                        {{ $citizen->first_name_ar}}--}}
                                            {{--                                                    </option>--}}
                                            {{--                                                @endforeach--}}
                                            {{--                                            </select>--}}
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">


                                            <label>@lang('site.status')</label>
                                            <select name="status" class="form-control select2">
                                                <option value="">@lang('site.select')</option>
                                                <option
                                                    value="ACCEPTABLE" {{ $card->status=='ACCEPTABLE'? 'selected' : '' }}>@lang('site.ACCEPTABLE')</option>
                                                <option
                                                    value="REJECTED" {{ $card->status=='REJECTED'? 'selected' : '' }}>@lang('site.REJECTED')</option>
                                                <option
                                                    value="REVISION" {{ $card->status=='REVISION'? 'selected' : '' }}>@lang('site.REVISION')</option>
                                            </select>
                                        </div>


                                    </div>
                                </div>

                                <div class="row">


                                    <div class="col-md-6">

                                        <div class="form-group">


                                            <label>@lang('site.operation_type')</label>
                                            <select name="operation_type" class="form-control select2">
                                                <option value="">@lang('site.select')</option>
                                                <option
                                                    value="WITHDRAW" {{ $card->operation_type=='WITHDRAW'? 'selected' : '' }}>@lang('site.WITHDRAW')</option>
                                                <option
                                                    value="DEPOSIT" {{ $card->operation_type=='DEPOSIT'? 'selected' : '' }}>@lang('site.DEPOSIT')</option>

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
