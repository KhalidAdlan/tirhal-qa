@extends('layouts.app')

@section('content')
<div class="container">
  @if(isset($message))
  <div class="alert alert-success">
<strong>Success!</strong> {{$message}}
</div>
  @endif

    <div class="row justify-content-center">



      <div id="printThis" class="col-md-10 box card-container">
           <div class="row">
             <div class="col-md-6 call-id">{{$call->id}}</div>
             <div class="col-md-6 pull-right">
               <table class="borderless"><tr><td>Evaluation Date :</td>
                 <td>{{$call->created_at}}</td>
                 <tr><td>Evaluation Update Date :</td>
                   <td>{{$call->updated_at}}</td></tr>
                   <tr><td>Phone:</td><td> {{$call->cusPhone}}</td></tr>
                 </table>
                 </div>
           </div>
           <div class="row">
             <div class="col-md-6 agent">{{$agent}}</div>
             <div class="col-md-6 pull-right"></div>
           </div>
           <div class="row">

             <div class="col-md-4 evaluation">Evaluation Score :{{$call->evaluation}}%</div>
           </div>
           <div class="row">
             <table class="table">
               <tr class="shaded">
               <th>Category</th>
               <th>Score</th>
             </tr>

             @foreach( $categories as $category)
                  <?php $splitted = explode("|", $category) ?>
                   <tr>
                      <td>{{$splitted[0]}}</td>
                      <td>{{$splitted[1]}}</td>
                   </tr>
            @endforeach
             </table>
             <div class="row summary">
               <p>Actual score: ({{$score}}/{{$full}})</p>

             </div>

           </div>
      </div>
      <br><br>



    </div>
    <div class="row justify-content-center">
      <div class="row">
      <button id="printBtn" class="btn  btn-default" >Print</button>
    </div>
  </div>
</div>
@endsection
