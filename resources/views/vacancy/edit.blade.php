@extends('layouts.app', ['pageTitle' => 'Edit Job Posting'])

@section('content')
    <div class="container">
        <div class="card border-light w-75 m-auto shadow-sm">
            <div class="card-header">Edit Job</div>
            <form action="{{ url()->route('vacancies.update', $vacancy) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <div class="card-body">
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?: $vacancy->title }}">
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
                            <textarea type="text" class="form-control" id="description" name="description" rows="10">{{ old('description') ?: $vacancy->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email Applications To:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?: $vacancy->email }}" placeholder="who should applications go to?" aria-describedby="emailHelpBlock">
                            <small id="emailHelpBlock" class="form-text">(Public)</small>
                            @if($errors->has('email'))
                                <div class="invalid-feedback d-block">
                                    {{ $errors->get('email')[0] }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <input type="submit" class="btn btn-danger" value="Delete" name="delete">
                    <div class="float-right">
                        <a href="{{ route('vacancies.show', $vacancy) }}" class="btn btn-default">Cancel</a>
                        <input type="submit" class="btn btn-primary float-right" value="Submit" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
