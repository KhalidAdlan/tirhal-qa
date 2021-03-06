@extends('layouts.app')

@section('content')
<div class="container">
  @if(isset($message))
  <div class="alert alert-success">
<strong>Success!</strong> {{$message}}
</div>
  @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Category</div>

                <div class="card-body row">

                  <form class="col-md-12"method="POST" action="{{route('categories.change.submit', ['id' => $category->id])}}">
                      @csrf

                      <div class="form-group row">
                          <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

                          <div class="col-md-6">
                              <input id="name" placeholder="(example: mentioned terhal name?)" type="text" class="form-control" name="name" value="{{$category->name}}" required >
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="value" class="col-sm-4 col-form-label text-md-right">{{ __('Value(s)') }}</label>

                          <div class="col-md-6">
                              <input id="value" placeholder='(example: 2)' type="text" class="form-control" name="value" value="{{$category->value}}" required >
                          </div>
                      </div>

                      <div class="form-group row">
                          <div class="col-md-7 offset-md-3">

                              <div class="row">
                                <label class="form-check-label pull-left text-md-right" for="man">
                                    {{ __('Mandatory Category?') }}
                                </label>
                                <select class="form-control col-md-6 offset-md-1" id="man" name="man">
                                  @if($category->mandatory == 0 )
                                    <option selected='selected' value="0">False</option>
                                    <option value="1">True</option>
                                  @endif

                                  @if($category->mandatory == 1)
                                    <option value="0">False</option>
                                    <option selected='selected' value="1">True</option>
                                  @endif

                                  </select>


                              </div>
                          </div>
                      </div>







                      <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <button type="submit" class="terhal-btn btn btn-primary">
                                  {{ __('Save') }}
                              </button>

                          </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
