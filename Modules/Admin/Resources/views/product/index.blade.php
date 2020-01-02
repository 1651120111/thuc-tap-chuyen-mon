@extends('admin::layouts.master')
@section('content')
<section class="content-header">
    <!--section starts-->
    <h2>Course Schedule</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index-2.html">
                <i class="fa fa-fw fa-home"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="#">Course Schedule</a>
        </li>
        <li>
            <a href="admin_courseschedule.html">Course Schedule</a>
        </li>
    </ol>
</section>
<!--section ends-->
<div class="container-fluid">
    <!--main content-->

    <div class="row">
        <div class="col-lg-12">
            <!-- Basic charts strats here-->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="fa fa-fw fa-user"></i> Danh sách sản phẩm
                    </h4>
                    <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                </div>
                <div class="row" style="margin-top: 2%;margin-left: 5%">
                    <div class="col-sm-12">
                        <form class="form-inline" style="margin-bottom:20px" action="">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{\Request::get('name')}}"
                                       placeholder="Tên sản phẩm..." name="name">
                            </div>

                            <div class="form-group">
                                <select name="cate" class="form-control" id="">
                                    <option value="">Danh mục</option>
                                    @if (isset($categories))
                                        @foreach($categories as $category)
                                            <option
                                                value="{{$category->id}}" {{\Request::get('cate')==$category->id ? "selected='selected'":""}}>{{$category->c_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <button type="submit" style="width: 50px;height: 35px;border-radius: 5px;margin-left: 4px"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <div role="tabpanel">

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="mon">
                                <table class="table table-bordered table1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Trạng thái</th>
                                        <th>Nổi bật</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($products))
                                        @foreach($products as $product)
                                        <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->pro_name}}
                                            <ul>
                                                <li><span><i class="fas fa-dollar"></i></span><span>{{number_format($product->pro_price,0,'.',',')}}</span></li>
                                                <li><span>{{$product->pro_sale}}%</span></li>
                                            </ul>
                                        </td>
                                        <td>{{isset($product->category->c_name)? $product->category->c_name :''}}</td>
                                        <td>{{$product->pro_avatar}}</td>
                                            <td> <a href="{{route('admin.get.action.product',['status',$product->id])}}" class=" {{$product->getStatus($product->pro_active)['class'] }}"  >
                                                    {{$product->getStatus($product->pro_active)['name'] }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.get.action.product',['hot',$product->id])}}" class=" {{$product->getHot($product->pro_hot)['class'] }}"  >
                                                    {{$product->getHot($product->pro_hot)['name'] }}
                                                </a>
                                            </td>
                                        <td>
                                            <a class="edit btn btn-primary mar-bm" href="{{route('admin.get.edit.product',$product->id)}}">
                                                <i class="fa fa-fw fa-edit"></i> Edit
                                            </a>
                                        </td>
                                        <td>
                                            <a class="delete btn btn-danger mar-bm" href="{{route('admin.get.action.product',['delete',$product->id])}}">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </a>
                                        </td>

                                    </tr>
                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- col-md-6 -->
    <!--row -->
    <!--row ends-->
</div>
@stop