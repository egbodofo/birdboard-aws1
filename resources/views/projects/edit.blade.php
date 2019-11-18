@extends ('layouts.app')

@section('content')

<div class="lg:w-1/2 lg:mx-auto bg-card p-6 md:py-12 md:px-16 rounded shadow">
    <form method="POST" action="{{ $project->path() }}">
        @csrf
        @method('PATCH')
        <h1 class="text-2xl font-normal mb-18 text-center">Edit your Project</h1>

        <div class="field">
            <label class="label text-sm mb-2 block" for="title">Title</label>

            <div class="control">
                <input type="text" class="input border w-full" name="title" placeholder="title" value="{{ $project->title }}">
            </div>
        </div>

        <div class="field">
            <label class="label text-sm mb-2 block" for="description">Description</label>

            <div class="control">
                <textarea name="description" rows="10" class="textarea border w-full" placeholder="">{{ $project->description }}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link mr-2">Update Project</button>
                <a href="{{ $project->path() }}">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection