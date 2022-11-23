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
                                <a href="{{ route('fetch') }}" class="btn btn-success btn-sm float-end">Fetch last post</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-inline" method="GET">
                            <div class="row mb-3">
                                <label class="col-sm-1 col-label-form">Filter:</label>
                                <div class="col-sm-2">

                                    <select name="filter_type" class="form-select" aria-label="Default select example">
                                        @foreach ($filterTypes as $ftype)
                                            <option value="{{ $ftype }}" @selected($filterType == $ftype)>
                                                {{ $ftype }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-sm-5">
                                    <input type="text" name="filter" class="form-control" placeholder="Post title..." value="{{$filter}}" />
                                </div>
                                <button type="submit" class="col-sm-1 btn btn-primary mb-2">Filter</button>
                            </div>
                        </form>

                        <table class="table table-bordered table-hover">
                            <thead>
                            <th class="col-sm-1">ID</th>
                            <th>Title</th>
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
                                    <td><a href="{{ $post->link }}" target="_blank">{{ $post->title }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $data->appends(Request::except('page'))->render() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
