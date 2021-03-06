@extends('layouts.dashboard.app')

@section('content')

    <!-- Start content-wrapper-->
    <div class="content-wrapper">

        <!-- Start Content Header-->
        <section class="content-header">
            <h1>@lang('site.clients')</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{route('dashboard.clients.index')}}">@lang('site.clients')</a></li>
                <li class="active">@lang('site.add')</li>

            </ol>
        </section>
        <!-- End Content Header-->

        <!-- Start content -->
        <section class="content">

            <!--start box-->
            <div class="box box-primary">

                <!--start box-header-->
                <div class="box-header">
                    <h3 class="box-title">@lang('site.add')</h3>
                </div><!--End box-header-->

                <!--start box-body-->
                <div class="box-body">

                    @include('partials._errors')
                    <!--start Form-->
                    <form action="{{route('dashboard.clients.store')}}" method="post">

                        {{csrf_field()}}
                        {{method_field('post')}}

                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>

                        @for($i = 0 ; $i < 2 ; $i++)
                            <div class="form-group">
                                <label>@lang('site.phone')</label>
                                <input type="text" name="phone[]" class="form-control">
                            </div>
                        @endfor

                        <div class="form-group">
                            <label>@lang('site.address')</label>
                            <textarea name="address" class="form-control">{{old('address')}}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus">@lang('site.add')</i></button>
                        </div>

                    </form><!--End Form-->
                </div><!--End box-body-->

            </div><!--End box-->


        </section><!-- End Content-->

    </div>
    <!-- End content-wrapper -->
@endsection