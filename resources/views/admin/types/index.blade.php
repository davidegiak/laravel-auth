@extends('layouts.admin')

@section('content')
    <div class="container-fluid d-flex flex-wrap">
        @foreach ($type as $item)
            <a class="card" style="width: 18rem;" href=" {{route('admin.types.show', $item->id)}} ">
                <p> img {{$item->icon}} </p>
                <h3> {{$item->task}} </h3>
            </a>
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
