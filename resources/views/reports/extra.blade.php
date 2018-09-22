@extends('layouts.app')

@section('content')
<div class="container">
  @if(isset($message))
  <div class="alert alert-success">
<strong>Success!</strong> {{$message}}
</div>
  @endif
<div class=" container-fluid">
     <form action="{{route('reports.extra.submit')}}" method="POST">
       @csrf
       <div class="form-group">
          <label for="month">month
          </label>
          <input class="form-control" type="month" id="month" name="month"></input>
       </div>
       <table class="table table-striped">
         <tr>
             <th>Agent Name</th>
             <th>Productivity</th>
             <th>Test</th>
         </tr>

       @foreach ($agents as $agent)
          <tr>
           <td>{{$agent->name}}</td>
           <td><input required class="form-control" type="text" name="p{{$agent->id}}"></input></td>
           <td><input required type="text" class="form-control" name="t{{$agent->id}}"></input></td>
          </tr>
       @endforeach

     </table>
     <div class="justify-center">
       <button type="submit" class="terhal-btn btn btn-primary">
           {{ __('Save') }}
       </button>
     </div>
     </form>
</div>




</div>


@endsection
