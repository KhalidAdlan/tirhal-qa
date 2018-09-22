@extends('layouts.app')

@section('content')
<div class="container">
  @if(isset($message))
  <div class="alert alert-success">
<strong>Success!</strong> {{$message}}
</div>
  @endif

    <div class="row justify-content-center">


      <div class="col-md-4">
          <div class="card">
              <div class="card-header">Agent Information</div>
              <div class="card-body row">
                <table class="table">
                  <tr>
                    <td>Agent Name</td>
                    <td>{{$agent->name}}</td>
                  </tr>

                  <tr>
                    <td>Agent Phone</td>
                    <td>{{$agent->phone}}</td>
                  </tr>

                  <tr>
                    <td>Agent Email</td>
                    <td>{{$agent->email}}</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
     <p hidden id="fullMark"> {{$fullMark}}</p>
          <div class="col-md-4 eval">
              <div class="card">
                  <div class="card-header">Current Evaluation</div>

                  <div class="card-body row">
                    <h1 id="result">0%</h1>
                  </div>
                </div>
              </div>

      <div class="col-md-8 card-container">
        <form action="{{route('calls.new.submit')}}" method="POST">
          @csrf
          <div class="card">
            <table class="table">

              <tr>
                 <th>Date of Call</th>
                 <th><input type="date" class="form-control" name="date" required></th>


             </tr>
             <tr class="hidden">
                <th class="hidden">Week #:</th>
                <th><select class="hidden form-control" name="week" required>
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                    </select>
                </th>

            </tr>
             <tr>
                <th>Customer Phone:</th>
                <th><input type="text" class="form-control" name="cusPhone" required></th>
                <input type="text" class="hidden" id="result-s" name="result"></input>
                <input type="text" class="hidden"  name="agent_id" value="{{$agent->id}}"></input>
                <input type="text" class="hidden"id="details" name="details"></input>

            </tr>



          </table>
        </div>
        <br>
        <div class="card">
          <table class="table table-striped">
                 <tr>
                    <th>Category</th>
                    <th>Result</th>

                </tr>
                @foreach ($categories as $category)
                   <tr>
                      <td> @if($category->mandatory == 1)
                               <span class="man-icon">X </span>
                               @endif
                        {{$category->name}}</td>
                      <td>
                         <?php $values = explode(",",$category->value) ?>
                         <select
                         @if($category->mandatory == 0)
                         class="select {{$category->abbr}} form-control">
                         @else
                         class="man {{$category->abbr}} select form-control">
                         @endif
                                @foreach ($values as $value)
                                 <option>{{$value}}</option>
                                @endforeach
                         </select>
                      </td>


                   </tr>
                @endforeach
                <tr>
                  <textarea class="margined col-md-8 form-control" placeholder="Enter your remark here .." name="remark"></textarea>
                </tr>
                <tr>
                  <td colspan="2" class="justify-content-center col-md-12"><button type="submit" class="terhal-btn btn btn-primary col-md-12">
                      {{ __('Save Evaluation') }}
                  </button></td>
                </tr>
            </table>
          </div>
      </div>
   </form>


    </div>
    <div class="row justify-content-center">

  </div>
</div>

@endsection
