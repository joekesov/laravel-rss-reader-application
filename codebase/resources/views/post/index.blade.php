@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-md-6"><b>Posts</b></div>
                            <div class="col col-md-6">
                                <a href="{{ route('urls.create') }}" class="btn btn-success btn-sm float-end">Fetch last post</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @if ($data->count() == 0)
                                <tr>
                                    <td colspan="5">No posts to display.</td>
                                </tr>
                            @endif

                            @foreach ($data as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <form style="display:inline-block" action="" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger"> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $data->links() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
