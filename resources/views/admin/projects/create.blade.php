@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Aggiungi un Project</h1>

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

                <form method="POST" action="{{ route('admin.projects.store') }} " enctype="multipart/form-data">
                    @csrf
                    <select name="type_id" id="">
                        @foreach ($type as $item)
                            <option value=" {{$item->id}} " @selected(old('type_id') ?? $item->id == 'type_id')> {{$item->task}} </option>
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <label class="form-label">title</label>
                        <input type="text" class="form-control" name="title" required value="{{ old('title') }}">
                        @error('title')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">description</label>
                        <textarea type="text" class="form-control" name="description" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">date</label>
                        <input type="text" class="form-control" name="date" required
                            value="{{ old('date') }}">
                        @error('date')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="img_url" class="form-label">Choose file</label>
                        <input type="file" class="form-control" name="img_url" id="img_url" placeholder="" aria-describedby="img_url-helper" />
                        <div id="img_url-helper" class="form-text">Upload an image for the curret project</div>
                        @error('img_url')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">status</label>
                        <textarea type="text" class="form-control" name="status" required>{{ old('status') }}</textarea>
                        @error('status')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">url gitHub</label>
                        <textarea type="text" class="form-control" name="git_url" required>{{ old('git_url') }}</textarea>
                        @error('git_url')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
