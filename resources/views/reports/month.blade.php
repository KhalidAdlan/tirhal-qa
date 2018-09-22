@extends('layouts.app')

@section('content')
<div class="container">
  @if(isset($message))
  <div class="alert alert-success">
<strong>Success!</strong> {{$message}}
</div>
  @endif

@if(!isset($agents))
    <div class="row justify-content-center">
        <div class="row col-md-5 card">

          <div class="card-header">Search Tools</div>

          <div class="card-body row">
           <form action="{{route('reports.month.submit')}}" method="POST">
             @csrf
             <table>
               <tr>

           <td colspan="2" class="report">
             <div class="form-group ">
                 <label for="month">Month:</label>
                 <input type="month" class="form-control" id="month" name="month"></input>

             </div>
           </td></tr>
           <tr>
           <td colspan="2" class="report">
                <br>
                <button type="submit" class="terhal-btn btn btn-primary">
                    {{ __('Generate') }}
                </button>
</td></tr>
</table>
           </form>
         </div>
        </div>






    </div>
    @endif
    <br>
    @if(isset($agents))
      <a href="{{route('reports.month.show')}}" class="btn terhal-btn">Back</a>
      <button class="btn btn-success noprint pull-right" id="cmd2">Download/Print</button><br><br>

      <br><bR>
    @endif
    <div class="row box bordered justify-content-center">
    @if(isset($agents))
    <div class="col-md-6">
       <img class="cropped-img-lg" src="{{asset('img/logo.png')}}"></img>
     </div>
    <div class="col-md-6">
       <h3>Monthly Report</h3>
       <div class="box-effect pull-right">
         <table class="move-right">

       <tr><td><h6 >Month: </h6></td><td><h6>{{$month}}</h6></td></tr>
       <tr><td><h6>Year: </h6></td><td><h6>{{$year}}</h6></td></tr>
     </table>
     </div>
     </div>
        <table id="pdfContents" class="table print-friendly bordered box-md">
          <tr class="shaded">
            <th>ID</th>
              <th>Agent Name</th>
              <th>Quality</th>
              <th>Productivity</th>
              <th>Test</th>
              <th>Performance</th>
              <th>Evaluation</th>

          </tr>
    @foreach ($agents as $agent)
          <tr>
               <td>{{$agent->id}}</td>
               <td>{{$agent->name}}</td>
               <td>({{ number_format($agent->monthEvaluation($month,$year),2,"."," ")/2 }} / 50)</td>
               <td>({{ number_format($agent->monthProductivity($month,$year),2,"."," ") }} / 40)</td>
               <td>({{ number_format($agent->monthTest($month,$year),2,"."," ") }} / 10)</td>
               <td>{{ number_format($agent->monthPerformance($month,$year),2,"."," ") }}%</td>
               <td>
                 @if (number_format($agent->monthPerformance($month,$year),2,"."," ") >= 98)
                    <span class="excellent">Excellent!</span>
                 @endif

                 @if (number_format($agent->monthPerformance($month,$year),2,"."," ") < 98 && number_format($agent->monthPerformance($month,$year),2,"."," ") >= 96)
                    <span class="vgood">Very Good</span>
                 @endif

                 @if (number_format($agent->monthPerformance($month,$year),2,"."," ") < 96 && number_format($agent->monthPerformance($month,$year),2,"."," ") >= 94)
                    <span class="good">Good</span>
                 @endif

                 @if (number_format($agent->monthPerformance($month,$year),2,"."," ") < 94 && number_format($agent->monthPerformance($month,$year),2,"."," ") >= 92)
                    <span class="average">Average</span>
                 @endif

                 @if (number_format($agent->monthPerformance($month,$year),2,"."," ") < 92 && number_format($agent->monthPerformance($month,$year),2,"."," ") >= 90)
                    <span class="acceptable">Acceptable</span>
                 @endif

                 @if (number_format($agent->monthPerformance($month,$year),2,"."," ") < 90)
                    <span class="weak">Weak</span>
                 @endif

               </td>
          </tr>
          @endforeach
        </table>
        @endif
    </div>
</div>

</div>
</div>


@endsection
