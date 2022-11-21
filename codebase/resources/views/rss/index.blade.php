@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if($message = Session::get('success'))

                    <div class="alert alert-success">
                        {{ $message }}
                    </div>

                @endif

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-md-6"><b>Rss urls Data</b></div>
                            <div class="col col-md-6">
                                <a href="{{ route('urls.create') }}" class="btn btn-success btn-sm float-end">Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Url</th>
                                <th>Action</th>
                            </tr>
                            @if(count($data) > 0)

                                @foreach($data as $row)

                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->rss_name }}</td>
                                        <td>{{ $row->url }}</td>
                                        <td>
                                            <form method="post" action="{{ route('urls.destroy', $row->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('urls.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
                                                <a href="{{ route('urls.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                                            </form>

                                        </td>
                                    </tr>

                                @endforeach

                            @else
                                <tr>
                                    <td colspan="5" class="text-center">No Data Found</td>
                                </tr>
                            @endif
                        </table>
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

