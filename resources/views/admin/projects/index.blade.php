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
                    <h5 class="card-title">Title: {{ $item['title'] }} </h5>
                    <p class="card-text">Description: {{ $item['description'] }} </p>
                    <p class="card-text">Date: {{ $item['date'] }} </p>
                    <p class="card-text">Status: {{ $item['status'] }} </p>
                    <a class="d-block" href="{{$item->git_url}}"> {{$item->git_url}} </a>
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
