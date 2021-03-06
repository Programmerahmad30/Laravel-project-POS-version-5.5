@extends('layouts.dashboard.app')

@section('content')

    <!-- Start content-wrapper-->
    <div class="content-wrapper">

        <!-- Start Content Header-->
        <section class="content-header">
            <h1>@lang('site.users')</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{route('dashboard.users.index')}}">@lang('site.users')</a></li>
                <li class="active">@lang('site.edit')</li>

            </ol>
        </section>
        <!-- End Content Header-->

        <!-- Start content -->
        <section class="content">

            <!--start box-->
            <div class="box box-primary">

                <!--start box-header-->
                <div class="box-header">
                    <h3 class="box-title">@lang('site.edit')</h3>
                </div><!--End box-header-->

                <!--start box-body-->
                <div class="box-body">

                @include('partials._errors')
                <!--start Form-->
                    <form action="{{route('dashboard.users.update', $user->id)}}" method="post" enctype="multipart/form-data">

                        {{csrf_field()}}
                        {{method_field('put')}}

                        <div class="form-group">
                            <label>@lang('site.first_name')</label>
                            <input type="text" name="first_name" class="form-control" value="{{$user -> first_name}}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.last_name')</label>
                            <input type="text" name="last_name" class="form-control" value="{{$user -> last_name}}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.email')</label>
                            <input type="email" name="email" class="form-control" value="{{$user -> email}}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{$user->image_path}}" style="width: 100px" class="img-thumbnail image_preview">
                        </div>


                        <div class="form-group">
                            <label>@lang('site.permissions')</label>

                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">

                                @php

                                    $models = ['users', 'categories', 'products', 'clients', 'orders'];
                                    $maps = ['create', 'read', 'update', 'delete']

                                @endphp

                                <ul class="nav nav-tabs">
                                    @foreach($models as $index => $model)
                                        <li class="{{$index == 0 ? 'active' : ''}}"><a href="#{{$model}}" data-toggle="tab">@lang('site.' . $model)</a></li>
                                    @endforeach
                                </ul>


                                <div class="tab-content">

                                    @foreach($models as $index => $model)

                                        <div class="tab-pane {{$index == 0 ? 'active' : ''}}" id="{{$model}}">

                                            @foreach($maps as $map)
                                                <label><input type="checkbox" name="permissions[]" {{$user -> hasPermission($map . '_' . $model) ? 'checked' : ''}} value="{{$map . '_' . $model }}"> @lang('site.' . $map)</label>
                                            @endforeach


                                        </div>
                                    @endforeach

                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- nav-tabs-custom -->

                        </div><!--End Of form-group-->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit">@lang('site.edit')</i></button>
                        </div>

                    </form><!--End Form-->
                </div><!--End box-body-->

            </div><!--End box-->


        </section><!-- End Content-->

    </div>
    <!-- End content-wrapper -->
@endsection