@extends('layouts.app')

@section('content')
<div class="container">
  @if(isset($message))
  <div class="alert alert-success">
<strong>Success!</strong> {{$message}}
</div>
  @endif

    <div class="row justify-content-center">

      @foreach ($agents as $agent)
      <div class="col-md-8 card-container">
          <div class="card">
              <div class="card-header">{{ucfirst($agent->name)}}</div>

              <div class="card-body">
                <strong>Email</strong> <span class="offset-md-2">{{$agent->email}}</span>
                <br><strong>Phone</strong> <span class="offset-md-2">{{$agent->phone}}</span>
                <hr>
                <div class="offset-md-6 col-md-12">
                <a class="col-md-3 terhal-btn btn btn-primary" role="button" href="/agents/{{$agent->id}}/change"><span class="glyphicon glyphicon-pencil"></span>Change</a>
                <a class="col-md-3 btn btn-danger" role="button" href="/agents/{{$agent->id}}/remove">Remove</a>
              </div>
              </div>
          </div>
      </div>

      @endforeach

    </div>
    <div class="row justify-content-center">
    {{ $agents->links() }}
  </div>
</div>
@endsection
