@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit Student</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('urls.update', $url->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">RSS Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="rss_name" class="form-control" value="{{ $url->rss_name }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">Url</label>
                                <div class="col-sm-10">
                                    <input type="text" name="url" class="form-control" value="{{ $url->url }}" />
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="hidden" name="hidden_id" value="{{ $url->id }}" />
                                <input type="submit" class="btn btn-primary" value="Edit" />
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
