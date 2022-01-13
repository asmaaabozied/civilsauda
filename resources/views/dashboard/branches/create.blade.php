
@extends('layouts.dashboard.app')

@section('content')

    <div class="page-wrapper" style="min-height: 422px;" data-select2-id="16">
        <div class="content container-fluid" data-select2-id="15">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">@lang('site.branches')</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</li>
                            <li class="breadcrumb-item"><a
                                    hhref="{{ route('dashboard.branches.index') }}"> @lang('site.branches') </a></li>
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
                            <h4 class="card-title">@lang('site.branches')</h4>
                            @include('partials._errors')

                            <form action="{{ route('dashboard.branches.store') }}" method="post"
                                  enctype="multipart/form-data">

                                {{ csrf_field() }}
                                {{ method_field('post') }}

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>@lang('site.name_ar')</label>
                                            <input type="text" name="name_ar" class="form-control"
                                                   value="{{ old('name_ar') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.name_en')</label>
                                            <input type="text" name="name_en" class="form-control"
                                                   value="{{ old('name_en') }}">
                                        </div>




                                            <div class="form-group">
                                                <label>@lang('site.description_ar')</label>
                                                <input type="text" name="description_ar" class="form-control"
                                                       value="{{ old('description_ar') }}">
                                            </div>
                                            <div class="form-group">
                                                <label>@lang('site.description_en')</label>
                                                <input type="text" name="description_en" class="form-control"
                                                       value="{{ old('name_en') }}">
                                            </div>





                                        <div class="form-group">
                                            <label>@lang('site.phone')</label>
                                            <input type="text" name="phone" class="form-control">
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
