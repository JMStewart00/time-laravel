@extends('layouts.master')


@section('content')

<div class="container-fluid">
   <div class="row">
      <div id="client_list" class="col-sm-10 col-md-8 mx-auto">
         <div class="row">
            <form id="add_clients"  class="col p-5 mx-auto" method="POST" action="/clients">
               {{ csrf_field() }}
               <div class="input-group">
                  <input type="text" class="form-control" name="client_name" placeholder="enter client name...">
                  <span class="input-group-btn">
                     <button class="btn btn-success px-5" name="submit" value="add_client" type="submit">Add</button>
                  </span>
               </div>
            </form>
         </div>
         <div class="row">
            @foreach ($clients as $client)
            <div class="col-6 client p-3 text-center">
               
               <a class="text-muted px-3 py-2 col-8 d-inline-block" href="/clients/{{$client->id}}">{{$client->name}}</a>

                  <button type="button" data-toggle="modal" data-target="#confirm" class="deleteBtn btn btn-sm btn-outline-danger border-0" value="{{$client->id}}"><i class="fa fa-trash fa-2x"></i></button>
 
            </div>

            @endforeach
         </div>
      </div>
   </div>
   
</div> <!-- end container -->

@endsection