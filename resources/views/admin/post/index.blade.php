<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Posts</h4>
                    <a href="{{ route('post.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        SN
                                    </th>
                                    <th>Post Title</th>
                                    <th>Featured Image</th>
                                    <th>Status</th>
                                    <th>Views</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $index => $post)
                                    <tr>
                                        <td>
                                            {{ ++$index }}
                                        </td>
                                        <td>
                                            {{ $post->title }}
                                        </td>
                                        <td>
                                            <img width="120" src="{{ asset($post->image) }}" class="w-full"
                                                alt="{{ $post->title }}">
                                        </td>
                                        <td>
                                            {{ $post->views }}
                                        </td>
                                        <td>
                                            @if ($post->status == 'pending')
                                                <span class="badge bg-warning text-white">{{ $post->status }}</span>
                                            @elseif ($post->status == 'approved')
                                                <span class="badge badge-success text-white">{{ $post->status }}</span>
                                            @else
                                                <span class="badge badge-danger text-white">{{ $post->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('post.edit', $post->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <button class="btn btn-sm btn-danger">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
