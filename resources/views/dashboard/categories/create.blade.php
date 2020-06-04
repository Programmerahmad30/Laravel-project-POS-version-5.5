@extends('layouts.dashboard.app')

@section('content')

    <!-- Start content-wrapper-->
    <div class="content-wrapper">

        <!-- Start Content Header-->
        <section class="content-header">
            <h1>@lang('site.categories')</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{route('dashboard.categories.index')}}">@lang('site.categories')</a></li>
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
                    <form action="{{route('dashboard.categories.store')}}" method="post">

                        {{csrf_field()}}
                        {{method_field('post')}}

                        @foreach(config('translatable.locales') as $locale)
                            <div class="form-group">
                                {{-- saite.en.name--}}
                                <label>@lang('site.' . $locale . '.name')</label>
                                {{-- en[name] --}}
                                <input type="text" name="{{$locale}}[name]" class="form-control" value="{{old($locale . '.name')}}">
                            </div>
                        @endforeach


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