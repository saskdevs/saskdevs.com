@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border-light w-75 m-auto shadow-sm">
            <div class="card-header">Post a Job</div>
            <form action="{{ url()->route('vacancies.store') }}" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title">
                            @if($errors->has('title'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->get('title')[0] }}
                                    </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="description" name="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <button class="btn btn-primary float-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection