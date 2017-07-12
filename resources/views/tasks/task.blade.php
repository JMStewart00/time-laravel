
@php
   
   $taskRunning = isset(session()->all()['_runningtask']);
   
   $running_task = ($taskRunning) ? session()->all()['_runningtask'] : NULL;
   
   $runningTime = ($taskRunning) ? (strtotime(date('Y-m-d H:i:s')) - $running_task['created_at']) : "";
   
   $clientName = "";
   
   if ($taskRunning) {
      $clientName = $clients->find(intval($running_task['client_id']))['name'];
      session()->reflash();
   }

@endphp

<nav class="navbar bg-inverse fixed-top text-center">
 <form method="post" action="/">
   
   @if ($taskRunning)
      {{ method_field('PATCH') }} 
   @endif

   {{ csrf_field() }}

      <input type="hidden" name="task_id" value="">
      <div>
         <div class="row" id="topNav">
            <div class="input-group col-5 pr-0 inputTopNav">

               @if ($taskRunning)
                  <input type="text" class="form-control" aria-label="Text input" name="task_name" id="task_name" value="{{$running_task['task_name']}}" placeholder="Enter Task Name...">
               @else
                  <input type="text" class="form-control" aria-label="Text input" name="task_name" id="task_name"  value="" placeholder="Enter Task Name...">
               @endif

            </div> 

            <div class="input-group col-3 px-0 inputTopNav">
               <input id=client_id name="client_id" type="hidden" value="{{intval($running_task['client_id'])}}">
               <input class="form-control" type="text" id="clientDrop" value="{{$clientName}}" placeholder="Select Client">
            </div>
            
            <div class="input-group col-2 inputTopNav pr-0">
<!-- 
               <label type="text" class="input-group-addon" aria-label="Text input with checkbox">Rate</label> -->
               <!-- <label type="text" class="input-group-addon" aria-label="Text input with checkbox">$</label> -->
               <div class="input-group-addon border-0 bg-inverse">$/hr.</div>
               @if ($taskRunning)
                  <!-- <label class="input-group-addon bg-inverse border-0" for="fader"><output for="fader" id="volume">{{$running_task['rate']}}</output></label> -->
                  <input class="form-control" type="number" min="5" max="200" value="{{$running_task['rate']}}" id="fader" step="5" name="rate">
                  <!-- <input class="ml-2" type="range" min="5" max="200" value="{{$running_task['rate']}}" id="fader" step="5" name="rate"> -->
               @else
                  <!-- <label class="input-group-addon bg-inverse border-0" for="fader"><output for="fader" id="volume">100</output></label> -->

                  <input class="form-control" type="number" min="5" max="200" value="{{$running_task['rate']}}" id="fader" step="5" name="rate">

                  <!-- <input class="ml-2" type="range" min="5" max="200" value="100" id="fader" step="5" name="rate"> -->
               @endif
            </div>
            <div class="col-2">
               
            @if ($taskRunning)

               <button id="starts_time" class="btn btn-danger col" value="{{$runningTime}}" value="start_task" type="submit">
               <i class="fa fa-stop-circle" aria-hidden="true"></i>
               </button>

            @else

               <button class="btn btn-outline-success col" value="" value="start_task" type="submit">
               <i class="fa fa-play" aria-hidden="true"></i>   
               </button>

            @endif
               </div>
            </div>
         </div>
      </div>
   </form>
</nav>
   
