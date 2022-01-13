@extends('layouts.dashboard.app')

@section('content')


    <div class="page-wrapper" style="min-height: 422px;">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">

                        <h3 class="page-title">{{$title}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a></li>

                            <li class="breadcrumb-item active">{{$title}}({{$count}})</li>
                        </ul>
                    </div>


                    <div class="col-auto">
                        <a href="{{route('dashboard.'.$model.'.create')}}" class="btn btn-primary me-1">
                            <i class="fas fa-plus"></i>
                        </a>
                        <a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search">
                            <i class="fas fa-filter"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <form action="{{ route('dashboard.citizens.index') }}" method="get">

            <div class="row">
                <div class="col-lg-4">
                    <label>@lang('site.descents')</label>
                    <select name="descent_id" class="form-control select2" id="descent_id" required>



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



                        @foreach (\App\Models\Arithmetic::get() as $city)
                            <option
                                value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>

                </div>

                <div class="col-lg-4">
                    <br>
                    <button  class="btn-primary" type="submit">Search</button>
                </div>
            </div>
            </form>
            <br>
            <!-- Search Filter -->
            <div class="row" data-select2-id="14">
                <div class="col-md-12">
                    <div class="card">


                        <div class="card-body">

                            {!! $dataTable->table([], true) !!}
                        </div>
                    </div>
                </div>
            </div>


            <!-- /Search Filter -->


        </div>
    </div>

@section('scripts')
    <script src="{{asset('style/app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>

    <script
        src="{{asset('style/app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('style/app-assets/js/custom/custom-script.js')}}"></script>



    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    {{--<script src="{{asset('style/app-assets/js/scripts/page-users.js')}}'"></script>--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>



    {!! $dataTable->scripts() !!}
@endsection

