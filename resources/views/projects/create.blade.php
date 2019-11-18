@extends ('layouts.app')

@section('content')

<div class="lg:w-1/2 lg:mx-auto bg-card p-6 md:py-12 md:px-16 rounded shadow">
    <form method="POST" action="/projects">
        @csrf
            <h1 class="text-2xl font-normal mb-18 text-center">Let's start something new</h1>

            <div class="field">
                <label class="label text-sm mb-2 block" for="title">Title</label>

                <div class="control">
                    <input type="text" class="input border w-full" name="title" placeholder="title">
                </div>
            </div>

            <div class="field">
                <label class="label text-sm mb-2 block" for="description">Description</label>

                <div class="control">
                    <textarea name="description" class="textarea border w-full"></textarea>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link mr-2">Create Project</button>
                    <a href="/projects">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection