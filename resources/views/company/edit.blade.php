@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-75 m-auto">
            @if (session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endif
            <div class="card border-light shadow-sm">
                <div class="card-header">Edit Company</div>
                <form action="{{ url()->route('companies.update', $company) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?: $company->name }}">
                                @if($errors->has('name'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->get('name')[0] }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-sm-2 col-form-label">Website</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="website" name="website" value="{{ old('website') ?: $company->website }}">
                                @if($errors->has('website'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->get('website')[0] }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        <button class="btn btn-primary float-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
