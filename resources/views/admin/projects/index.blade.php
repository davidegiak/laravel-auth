@extends('layouts.admin')

@section('content')
    <div class="container-fluid d-flex flex-wrap">
        @foreach ($project as $item)
            <div class="card" style="width: 18rem;">
                {{-- <img src=" {{$item->img_url}} " class="card-img-top"> --}}
                @if (Str::startsWith($item->img_url, 'http'))
                <img width="140" src="{{ $item->img_url }}" class="card-img-top">
                @else
                <img width="140" src="{{ asset('/storage/' . $item->img_url) }}" class="card-img-top">
                @endif
                <div class="card-body">
                    <h5 class="card-title"> {{ $item['title'] }} </h5>
                    <p class="card-text"> {{ $item['description'] }} </p>
                    <p class="card-text"> {{ $item['date'] }} </p>
                    <p class="card-text"> {{ $item['status'] }} </p>
                    {{-- <p class="card-text"> {{ $item['img_url'] }} </p> --}}
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
