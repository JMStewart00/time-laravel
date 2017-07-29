
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <title>Taskr</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <script>
      let autocompleteTasks = "{!!URL::route('autocomplete')!!}",
          autocompleteClients = "{!!URL::route('autocompleteClient')!!}";
    </script>

 </head>
 <body>
  <div class="container-fluid">
    @include('tasks.task')

    <div id="main_content">
      @yield('content')
    </div>
    
 

  @include('layouts.footer')
 </div>
 <div class="modal fade" id="confirm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this client and all associated tasks?</p>
                <p>this client has <span id="taskLists"></span> tasks assosiated with it!</p>
            </div>
            <div class="modal-footer">
            <form id="modalDelete" action="" method="post" class="d-inline-block col-2" >
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-sm btn-danger" id="delete-btn">Delete</button>
                              </form>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>


  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

   <script src="js/app.js"></script>



 </body>
</html>

