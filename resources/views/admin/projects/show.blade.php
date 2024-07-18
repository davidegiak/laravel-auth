@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card" style="width: 18rem;">
        {{-- <img src=" {{$project->img_url}} " class="card-img-top" alt=""> --}}
        @if (Str::startsWith($project->img_url, 'http'))
                <img width="140" src="{{ $project->img_url }}" class="card-img-top">
                @else
                <img width="140" src="{{ asset('storage/' . $project->img_url) }}" class="card-img-top">
                @endif
        <div class="card-body">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">{{ $project->description }}</p>
            <p class="card-text">{{ $project->date }}</p>
            <p class="card-text">{{ $project->status }}</p>
            <p class="card-text">{{ $project->type->task }}</p>
            
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Back to List</a>
            
            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-secondary">Edit</a>
           
            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro?')">Cancella</button>
            </form>
        </div>
    </div>
</div>

<style scoped>
    body {
        background-color: #222;
    }
    .card {
        margin: 1.5rem;
        background-color: red; 
    }
</style>

@endsection