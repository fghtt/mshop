@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Создать категорию</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Продукты</a></li>
                            <li class="breadcrumb-item active">Создать</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid pt-2 pl-4 col-12">
                <form action="{{route('admin.order.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-3">
                        @error('date')
                        <label class="text-danger">{{$message}}</label>
                        @else
                            <label>Дата</label>
                            @enderror
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input name="date" type="text" class="form-control" data-inputmask-alias="datetime"
                                       data-inputmask-inputformat="mm.dd.yyyy" data-mask="" inputmode="numeric">
                            </div>
                    </div>
                    <div class="form-group col-3">
                        @error('phone')
                        <label class="text-danger">{{$message}}</label>
                        @else
                            <label>Телефон</label>
                            @enderror
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input name="phone" type="text" class="form-control"
                                       data-inputmask="&quot;mask&quot;: &quot;+7(*99) 999-99-99&quot;" data-mask=""
                                       inputmode="text">
                            </div>
                    </div>
                    <div class="form-group col-3">
                        @error('email')
                        <label class="text-danger">{{$message}}</label>
                        @else
                            <label>Email</label>
                            @enderror
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope"
                                                                      aria-hidden="true"></i></span>
                                </div>
                                <input name="email" type="email" class="form-control">
                            </div>
                    </div>
                    <order_map></order_map>
                    <order_products></order_products>
                    <div class="form-group mt-4 mb-3">
                        <input class="btn btn-primary" type="submit" value="Добавить">
                    </div>
                </form>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection

