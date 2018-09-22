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
                <div class="card-header">Change {{ucfirst($agent->name)}}</div>

                <div class="card-body row">
                  <div class="col-md-3 img-container">
                    <div class="image"><img class="img" width="100px" src="{{asset('img/agent.svg')}}"></img></div>
                  </div>
                  <form class="col-md-9" method="POST" action="{{route('agents.change.submit',['id' => $agent->id])}}">
                      @csrf

                      <div class="form-group row">
                          <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control" name="name" value="{{$agent->name}}" required >
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control" name="email" value="{{$agent->email}}" required >
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="phone" class="col-sm-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                          <div class="col-md-6">
                              <input id="phone" type="text" class="form-control" name="phone" value="{{$agent->phone}}" required >
                          </div>
                      </div>







                      <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <button type="submit" class="terhal-btn btn btn-primary">
                                  {{ __('Change') }}
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
