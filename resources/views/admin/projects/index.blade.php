@extends('layouts.admin')

@section('content')
    <div class="container-fluid d-flex flex-wrap">
        @foreach ($project as $item)
            <div class="card" style="width: 18rem;">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title"> {{ $item['title'] }} </h5>
                    <p class="card-text"> {{ $item['description'] }} </p>
                    <p class="card-text"> {{ $item['start_date'] }} </p>
                    <p class="card-text"> {{ $item['end_date'] }} </p>
                    <p class="card-text"> {{ $item['status'] }} </p>
                    <a href="{{route('admin.projects.show', $item->id)}}" class="btn btn-primary">MORE</a>
                </div>
            </div>
        @endforeach
    </div>



    <style scoped>
        body {
            background-color: #222;
        }

        .card {
            margin: 1.5rem
        }
    </style>
@endsection
