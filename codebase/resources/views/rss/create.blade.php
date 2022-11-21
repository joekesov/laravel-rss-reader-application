@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if($errors->any())

                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach
                        </ul>
                    </div>

                @endif

                <div class="card">
                    <div class="card-header">Add Rss url</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('urls.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">Rss Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="rss_name" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">Url</label>
                                <div class="col-sm-10">
                                    <input type="text" name="url" class="form-control" />
                                </div>
                            </div>


                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="Add" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

