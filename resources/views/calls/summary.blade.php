@extends('layouts.app')

@section('content')
<div class="container">
  @if(isset($message))
  <div class="alert alert-success">
<strong>Success!</strong> {{$message}}
</div>
  @endif

    <div class="row justify-content-center">



      <div class="col-md-8 card-container">
          <div class="card">
            <table class="table table-striped">
                 <tr>
                    <th>Agent</th>
                    <th>Evaluated Calls</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($agents as $agent)
                   <tr>
                      <td>{{$agent->name}}</td>
                      <td>{{$agent->numberOfCalls()}}</td>
                      <td></td>
                      <td><a class="change" href="{{route('calls.agent-calls', ['id' => $agent->id])}}">Details</a></td></td>
                      <td><a class="change" href="{{route('calls.eval.show', ['id' => $agent->id])}}">New Call +</a></td>

                   </tr>
                @endforeach
            </table>
          </div>
      </div>



    </div>
    <div class="row justify-content-center">

  </div>
</div>
@endsection
