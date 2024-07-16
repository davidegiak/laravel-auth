@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Modifica un Project</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <form method="POST" action="{{ route('admin.projects.update', $project->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">title</label>
                        <input type="text" class="form-control" name="title" required value="{{ old('title', $project->title) }}">
                        @error('title')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">description</label>
                        <textarea type="text" class="form-control" name="description" required>{{ old('description', $project->description) }}</textarea>
                        @error('description')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">start_date</label>
                        <input type="text" class="form-control" name="start_date" required
                            value="{{ old('start_date', $project->start_date) }}">
                        @error('start_date')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">end_date</label>
                        <input type="text" class="form-control" name="end_date" required value="{{ old('end_date', $project->end_date) }}">
                        @error('end_date')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">status</label>
                        <textarea type="text" class="form-control" name="status" required>{{ old('status', $project->status) }}</textarea>
                        @error('status')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
