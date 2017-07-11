<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
@php
   $taskRunning = isset(session()->all()['_runningtask']);
   $running_task = ($taskRunning) ? session()->all()['_runningtask'] : NULL;
   $runningTime = ($taskRunning) ? (strtotime(date('Y-m-d H:i:s')) - $running_task['created_at']) : "";
   if ($taskRunning === true) {
      session()->reflash();
   }


@endphp
   <script type="text/javascript">
    $('#task_name').autocomplete({
      source : '{!!URL::route('autocomplete')!!}',
      minlenght:1,
      autoFocus:true,
      select:function(e,ui){
        alert(ui);
        console.log('heyo');
      }

    });
</script>
 <form method="post" action="/">
   @if ($taskRunning)
      {{ method_field('PATCH') }} 
   @endif
   {{ csrf_field() }}
      <input type="hidden" name="task_id" value="">
      <div class="container p-0">
         <div class="row" id="topNav">
            <div class="input-group col-4 inputTopNav">
               <span class="input-group-addon">Task</span>
               @if ($taskRunning)
                  <input type="text" class="form-control" aria-label="Text input" name="task_name" id="task_name" placeholder="Enter task name here..." value="{{$running_task['task_name']}}">
               @else
                  <input type="text" class="form-control" aria-label="Text input" name="task_name" id="task_name" placeholder="Enter task name here..." value="">
               @endif
            </div>   
            <div class="col select-style">

               <input type="text" name="client_id" id="clientDrop">
               <!-- <select name="client_id" id="clientDrop">
                  <option>clients</option>
                  @foreach ($clients as $client)
                     @if ($taskRunning and $client['id'] === intval($running_task['client_id']))
                        <option selected value={{$client['id']}}>{{$client['name']}}</option>
                     @else
                        <option value={{$client['id']}}>{{$client['name']}}</option>
                     @endif
                  @endforeach
               </select> -->
            </div>

            <div class="input-group col inputTopNav">
               <label type="text" class="input-group-addon" aria-label="Text input with checkbox">Rate</label>
               <label type="text" class="input-group-addon" aria-label="Text input with checkbox">$</label>
               @if ($taskRunning)
                  <label class="input-group-addon" for="fader"><output for="fader" id="volume">{{$running_task['rate']}}</output></label>
                  <input class="ml-2" type="range" min="5" max="200" value="{{$running_task['rate']}}" id="fader" step="5" name="rate">
               @else
                  <label class="input-group-addon" for="fader"><output for="fader" id="volume">100</output></label>
                  <input class="ml-2" type="range" min="5" max="200" value="100" id="fader" step="5" name="rate">
               @endif
            </div>
            @if ($taskRunning)
               <button id="starts_time" class="btn btn-danger" value="" name="submit" value="start_task" type="submit">
               <i class="fa fa-stop-circle" aria-hidden="true"></i>   
               </button>
            @else
               <button class="btn btn-success" value="" name="submit" value="start_task" type="submit">
               <i class="fa fa-play" aria-hidden="true"></i>   
               </button>
            @endif
            <div id="timer" class="col-1">
               <span value="{{$runningTime}}"></span>
            </div>
         </div>
         </div>
      </form>
      


  

