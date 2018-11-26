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
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="title">
                            @if($errors->has('title'))
                                <div class="invalid-feedback d-block">
                                    {{ $errors->get('title')[0] }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description" rows="10">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback d-block">
                                    {{ $errors->get('description')[0] }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email Applications To:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="who should applications go to?" aria-describedby="emailHelpBlock">
                            <small id="emailHelpBlock" class="form-text">(Public)</small>
                            @if($errors->has('email'))
                                <div class="invalid-feedback d-block">
                                    {{ $errors->get('email')[0] }}
                                </div>
                            @endif
                        </div>
                    </div>
                    @if (Auth::user()->companies->count() > 0)
                    <div class="form-group row">
                        <label for="company_id" class="col-sm-2 col-form-label">Company</label>
                        <div class="col-sm-10">
                            <select type="text" class="form-control" id="company_id" name="company_id">
                                <option value=""></option>
                                @foreach (Auth::user()->companies as $company)
                                    <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected="selected"' : ''}}>{{ $company->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('company_id'))
                                <div class="invalid-feedback d-block">
                                    {{ $errors->get('company_id')[0] }}
                                </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
                <div class="card-footer clearfix">
                    <button class="btn btn-primary float-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
