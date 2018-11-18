@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border-light w-75 m-auto shadow-sm">
            <div class="card-header">Create Company</div>
            <form action="{{ url()->route('companies.store') }}" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name">
                            @if($errors->has('name'))
                                <div class="invalid-feedback d-block">
                                    {{ $errors->get('name')[0] }}
                                </div>
                            @endif
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
