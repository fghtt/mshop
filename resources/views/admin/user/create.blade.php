@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Создать пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.user.index')}}">Пользователи</a></li>
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
                <form action="{{route('admin.user.store')}}" method="post" class="w-25">
                    @csrf
                    <div class="form-group">
                        @error('name')
                        <label class="text-danger">{{$message}}</label>
                        @else
                            <label>Имя</label>
                            @enderror
                            <input class="form-control" name="name" type="text">
                    </div>
                    <div class="form-group">
                        @error('email')
                        <label class="text-danger">{{$message}}</label>
                        @else
                            <label>Email</label>
                            @enderror
                            <input class="form-control" name="email" type="text">
                    </div>
                    <div class="form-group">
                        @error('password')
                        <label class="text-danger">{{$message}}</label>
                        @else
                            <label>Пароль</label>
                            @enderror
                            <input class="form-control" name="password" type="password">
                    </div>
                    <div class="form-group">
                        @error('role_id')
                        <label class="text-danger">{{$message}}</label>
                        @else
                            <label>Роль</label>
                            <select class="form-control" name="role_id">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->title}}</option>
                                @endforeach
                            </select>
                            @enderror
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

