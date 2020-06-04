@extends('layouts.dashboard.app')

@section('content')

    <!-- Start content-wrapper-->
    <div class="content-wrapper">

        <!-- Start Content Header-->
        <section class="content-header">
            <h1>@lang('site.products')</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{route('dashboard.products.index')}}">@lang('site.products')</a></li>
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
                    <form action="{{route('dashboard.products.update', $product->id)}}" method="post" enctype="multipart/form-data">

                        {{csrf_field()}}
                        {{method_field('put')}}

                        <div class="form-group">
                            <label>@lang('site.categories')</label>
                            <select name="category_id" class="form-control">
                                <option>@lang('site.all_categories')</option>

                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$product ->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        @foreach(config('translatable.locales') as $locale)
                            <div class="form-group">
                                {{-- saite.en.name--}}
                                <label>@lang('site.' . $locale . '.name')</label>
                                {{-- en[name] --}}
                                <input type="text" name="{{$locale}}[name]" class="form-control" value="{{$product -> name}}">
                            </div>

                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.description')</label>
                                <textarea name="{{$locale}}[description]" class="form-control ckeditor">{{$product -> description}}</textarea>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{$product -> image_path}}" style="width: 150px" class="img-thumbnail image_preview">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.purchase_price')</label>
                            <input type="number" name="purchase_price" class="form-control" step="0.01" value="{{$product -> purchase_price}}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.sale_price')</label>
                            <input type="number" name="sale_price" step="0.01" class="form-control" value="{{$product -> sale_price}}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.stock')</label>
                            <input type="number" name="stock" class="form-control" value="{{$product -> stock}}">
                        </div>



                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus">@lang('site.edit')</i></button>
                        </div>

                    </form><!--End Form-->
                </div><!--End box-body-->

            </div><!--End box-->


        </section><!-- End Content-->

    </div>
    <!-- End content-wrapper -->
@endsection