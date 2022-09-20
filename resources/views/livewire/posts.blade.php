<div>

    @if (session()->has('message'))
        <center>
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class="font-medium">Success! </span> {{ session('message') }}
            </div>
        </center>
    @endif

    @if ($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif

    {{-- test showings --}}
    {{-- <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>name</th>
                <th>email</th>
                <th>subject</th>
                <th>Body</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->email }}</td>
                    <td>{{ $post->subject }}</td>
                    <td>{{ $post->body }}</td>
                    <td>
                        <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm">Edit</button>
                        <button wire:click="delete({{ $post->id }})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
</div>
