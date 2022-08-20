@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 mt-5">
                @include('sections.errors')
                <div class="card">
                    <div class="card-header">
                        ویرایش تسک جدید
                    </div>
                    <div class="card-body">
                        <form action="{{ route('todos.update',['todo'=>$todo->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" name="title" id="title" value="{{$todo->title}}"
                                 class="form-control @error('title') form-control-invalid @enderror">
                                @error('title')
                                    <p class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea name="description"  id="description"
                                class="form-control @error('description') form-control-invalid @enderror">
                                    {{$todo->description}}
                                </textarea>
                                @error('description')
                                <p class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                            </div>
                            <button type="submit" class="btn btn-dark">ویرایش</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
