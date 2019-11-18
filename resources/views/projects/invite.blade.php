<div class="card flex flex-col mt-3">
    <h3 class="font-normal text-xl py-4-ml-5 mb-2 border-l-4 border-blue-300 pl-4">
        Invite a User
    </h3>

    <form method="POST" action="{{ $project->path() . '/invitations' }}">

        @csrf

        <div class="mb-3">
            <input type="email" name="email" class="border border-gray rounded w-full py-2 px-3" placeholder="Email address">
        </div>

        <button class="text-xs button" type="submit">Invite</button>
    </form>

    @include ('errors', ['bag' => 'invitations'])
</div>