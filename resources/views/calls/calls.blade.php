@extends('layouts.app')

@section('content')
<div class="container">
  @if(isset($message))
  <div class="alert alert-success">
<strong>Success!</strong> {{$message}}
</div>
  @endif

    <div class="row justify-content-center">



      <div class="col-md-10 card-container">
          <div class="card">
            <table class="table table-striped">
                 <tr>
                   <th>Call ID</th>
                    <th>Phone Number</th>
                    <th>Remark</th>
                    <th>Evaluation</th>
                    <th>Evaluation Date</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($calls as $call)
                   <tr>
                     <td>#{{$call->id}}</td>
                      <td>{{$call->cusPhone}}</td>
                      <td> {{$call->remark}}</td>
                      <td>{{$call->evaluation}}%</td>

                      <td>{{$call->created_at}}</td>
                      <td><a class="change" href="{{route('calls.call-details', ['id' => $call->id])}}">Details</a></td></td>
                      <td><a class="change" href="{{route('calls.remove',['id' => $call->agent_id])}}?cid={{$call->id}}">Remove</a></td>

                   </tr>
                @endforeach
            </table>
          </div>
          <br>
          <div class="row justify-content-center">
          {{ $calls->links() }}
        </div>
      </div>



    </div>
    <div class="row justify-content-center">

  </div>
</div>
@endsection
