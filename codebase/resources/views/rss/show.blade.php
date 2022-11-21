@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-md-6"><b>RSS url Details</b></div>
                            <div class="col col-md-6">
                                <a href="{{ route('urls.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form"><b>RSS Name</b></label>
                            <div class="col-sm-10">
                                {{ $url->rss_name }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form"><b>Url</b></label>
                            <div class="col-sm-10">
                                {{ $url->url }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
