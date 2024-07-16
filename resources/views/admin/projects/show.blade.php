@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card" style="width: 18rem;">
        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">{{ $project->description }}</p>
            <p class="card-text">{{ $project->start_date }}</p>
            <p class="card-text">{{ $project->end_date }}</p>
            <p class="card-text">{{ $project->status }}</p>
            
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