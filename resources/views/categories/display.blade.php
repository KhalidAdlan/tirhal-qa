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
                    <th>Category</th>
                    <th>Value(s)</th>
                    <th>Mandatory</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($categories as $category)
                   <tr>
                      <td>{{$category->name}}</td>
                      <td>{{$category->value}}</td>
                      <td>
                        @if($category->mandatory > 0)
                           True
                        @endif
                        @if($category->mandatory == 0)
                           False
                        @endif
                      </td>
                      <td><a class="change" href="{{route('categories.change.show',['id' => $category->id])}}">Change</a></td>
                      <td><a class="remove" href="{{route('categories.remove',['id' => $category->id])}}">Remove</a></td>
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
