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
                            <li class="breadcrumb-item"><a href="{{route('admin.products_category.index')}}">Категории</a></li>
                            <li class="breadcrumb-item active">Создать</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid pt-2 pl-4">
                <form action="{{route('admin.products_category.store')}}" method="post" class="w-25">
                    @csrf
                    <div class="form-group">
                        @error('title')
                        <label class="text-danger">{{$message}}</label>
                        @else
                            <label>Название</label>
                            @enderror
                            <input class="form-control" name="title" type="text">
                    </div>
                    <div class="form-group">
                        @error('alias')
                        <label class="text-danger">{{$message}}</label>
                        @else
                            <label>Алиас</label>
                            @enderror
                            <input class="form-control" name="alias" type="text">
                    </div>
                    <div class="form-group">
                        @error('discount')
                        <label class="text-danger">{{$message}}</label>
                        @else
                            <label>Скидка %</label>
                            @enderror
                        <input class="form-control" name="discount" type="number">
                    </div>

                    <div class="form-group mt-4">
                        <input class="btn btn-primary" type="submit" value="Добавить">
                    </div>
                </form>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection

