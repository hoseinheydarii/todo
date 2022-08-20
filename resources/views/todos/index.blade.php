@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-between my-3 align-items-center">
                    <h4>تسک ها</h4>
                    <a href="{{ route('todos.create') }}" class="btn btn-sm btn-outline-dark ">
                        ایجاد تسک
                    </a>
                </div>

                <div class="card">
                    <div class="card-header">
                        تسک ها
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($todos as $todo)
                                <li class="list-group-item d-flex justify-content-between">
                                    {{ $todo->title }}
                                    <div>
                                        <a href="{{ route('todos.show', ['todo' => $todo->id]) }}"
                                            class="btn btn-sm btn-dark ">
                                            نمایش
                                        </a>
                                        @if ($todo->complated == 0)
                                            <a href="{{ route('todos.complate', ['todo' => $todo->id]) }}"
                                                class="btn btn-sm btn-outline-info ">
                                                انجام شد
                                            </a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="justify-content-center d-flex mt-5">
                    {{ $todos->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
