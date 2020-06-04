@extends('layouts.dashboard.app')

@section('content')

    <!-- Start content-wrapper-->
    <div class="content-wrapper">

        <!-- Start Content Header-->
        <section class="content-header">
            <h1>@lang('site.products')</h1>

            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class="active">@lang('site.products')</li>

            </ol>
        </section>
        <!-- End Content Header-->

        <!-- Start content -->
        <section class="content">

            <!-- start of box-->
            <div class="box box-primary">

                <!-- stat of box-header-->
                <div class="box-header with-border">
                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.products') <small>{{$products->total()}}</small></h3>

                    <!--start Form-->
                    <form action="{{route('dashboard.products.index')}}" method="get">
                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <select name="category_id" class="form-control">
                                    <option value="">@lang('site.all_categories')</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category -> id}}" {{request()-> category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>

                                @if(auth()->user()->hasPermission('create_products'))
                                    <a href="{{route('dashboard.products.create')}}" class=" btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</a>
                                @else
                                    <a href="#" class=" btn btn-primary disabled"><i class="fa fa-plus"></i>@lang('site.add')</a>
                                @endif
                            </div>
                        </div>
                    </form><!--End Form-->
                </div><!-- End of box-header-->

                <!-- Start of box-body-->
                <div class="box-body">

                    @if($products -> count() > 0)

                        <!-- End of table-->
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('site.name')</th>
                                    <th>@lang('site.description')</th>
                                    <th>@lang('site.category')</th>
                                    <th>@lang('site.image')</th>
                                    <th>@lang('site.purchase_price')</th>
                                    <th>@lang('site.sale_price')</th>
                                    <th>@lang('site.profit_percent') %</th>
                                    <th>@lang('site.stock')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach($products as $index => $product)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$product -> name}}</td>
                                            <td>{!! $product -> description !!}</td>
                                            <td>{!! $product -> category -> name !!}</td>
                                            <td><img src="{{$product->image_path}}" style="width: 100px" class="img-thumbnail"></td>
                                            <td>{{$product -> purchase_price}}</td>
                                            <td>{{$product -> sale_price}}</td>
                                            <td>{{$product -> profit_percent}} %</td>
                                            <td>{{$product -> stock}}</td>
                                            <td>
                                                @if(auth()->user()->hasPermission('update_products'))
                                                    <a href="{{route('dashboard.products.edit', $product -> id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>@lang('site.edit')</a>
                                                @else
                                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>@lang('site.edit')</a>
                                                @endif

                                                @if(auth()->user()->hasPermission('delete_products'))

                                                    <!--Start Of Form-->
                                                        <form action="{{route('dashboard.products.destroy', $product->id)}}" method="post" style="display: inline-block">
                                                            {{csrf_field()}}
                                                            {{method_field('delete')}}
                                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                                        </form><!--End Of Form-->

                                                @else
                                                    <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><!-- End of table-->

                        {{$products->appends(request()->query())->links()}}
                    @else
                            <h2>@lang('site.no_data_found')</h2>
                    @endif

                </div><!-- End of box-body-->

            </div><!-- End of box-->

        </section><!-- End Content-->

    </div>
    <!-- End content-wrapper -->
@endsection