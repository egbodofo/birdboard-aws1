<div class="card flex flex-col" style="height: 200px">
    <h3 class="font-normal text-xl py-4-ml-5 mb-2 border-l-4 border-blue-300 pl-4">
        <a href="{{ $project->path() }}" class="text-default no-underline">{{ $project->title }}</a>
    </h3>

    <div class="text-default mb-4 flex-1">{{ str_limit($project->description, 50) }}</div>

    @can ('manage', $project)
    <footer>

        <form method="POST" action="{{ $project->path() }}" class="text-right">
            @method('DELETE')
            @csrf
            <button class="text-xs button" type="submit">Delete</button>
        </form>

    </footer>
    @endcan
</div>
