// checks for #starts_time id in DOM 
   if (Boolean($('#starts_time').length)){
    // get value in span which is the diff bettween the current time 
    //and when the task was created and sets the starting seconds to it.
      var s = $('#starts_time').attr('value');
    // start timer  
      let timer = window.setInterval(time, 1000);
   }

// counts up seconds and makes a time format for #timer span
   function time () {
      s++;
      let h = pad(Math.floor((s/60)/60 % 60)),
          m = pad(Math.floor((s/60) % 60)),
          sec = pad(Math.floor(s % 60)),
          timer = h + ":" + m + ":" + sec;
          console.log('test');
      $('#starts_time').html(timer);
   }

// adds left 0 padding if number is single digit
   function pad(d) {
    return (d < 10) ? '0' + d.toString() : d.toString();
}

   $('#fader').on("input", function(val){
      $('#volume').html(val.target.value);
      $('#fader').attr('value', val.target.value);
   });

// Autocomplete list for TASK input, list in TasksController
   $('#task_name').autocomplete({
      minLength: 0,
      source : autocompleteTasks,
      focus: function( event, ui ) {
         $( "#task_name" ).val( ui.item.label );
         return false;
      }
   });

   // Autocomplete list for client input, list in ClientController
   $('#clientDrop').autocomplete({
      minLength: 0,
      source : autocompleteClients,
      focus: function(event, ui) {
         $( "#clientDrop" ).val( ui.item.value );
         return false;
      },
      select: function (event, ui) {
         $( "#client_id" ).val( ui.item.id );
      }
   });

   // Drops down list on focus of Client inbox
   $('#clientDrop').on( "focus", function( event, ui ) {
          event.stopPropagation();
         $(this).trigger(jQuery.Event("keydown"));
      // Since I know keydown opens the menu, might as well fire a keydown event to the element
   });

   $("input[name=check]").click(function(e) {
    e.preventDefault();
    $(this).trigger("change");
  });

   $("input[name=check]").change(function() {
     var searchIDs = $("input:checkbox:checked").map(function(){
        return $(this).val();
    }).toArray();
    console.log(searchIDs);
    });


   $(".deleteBtn").click(function(e){
      $('#modalDelete').attr('action', '/clients/'+e.target.value);
      // $('#taskList')
   })






