@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Обновить категорию</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Товарыm "</a></li>
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
                <form action="{{route('admin.product.update', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group col-3">
                        @error('title')
                        <label class="text-danger">{{$message}}</label>
                        @else
                            <label>Название</label>
                            @enderror
                            <input class="form-control" name="title" type="text" value="{{$product->title}}">
                    </div>
                    <div class="form-group  col-3">
                        @error('discount')
                        <label class="text-danger">{{$message}}</label>
                        @else
                            <label>Скидка %</label>
                            @enderror
                            <input class="form-control" name="discount" type="number" value="{{$product->discount}}">
                    </div>
                    <div class="form-group  col-3">
                        @error('price')
                        <label class="text-danger">{{$message}}</label>
                        @else
                            <label>Цена</label>
                            @enderror
                            <input class="form-control" name="price" type="number" value="{{$product->price}}">
                    </div>
                    <div class="form-group col-6">
                        @error('description')
                        <label class="text-danger">{{$message}}</label>
                        @else
                            <label>Описание</label>
                            @enderror
                            <textarea id="summernote" name="description">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group col-6">
                        @error('preview')
                        <label class="text-danger">{{$message}}</label>
                        @enderror
                        <div class="w-50 mb-3">
                            <img class="w-100" src="{{asset('storage/' . $product->preview)}}" alt="preview">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="preview">
                                <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
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

