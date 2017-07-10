   if (!Boolean($('#starts_time').length)){
      var s = 9000;
      let timer = window.setInterval(time, 1000);
   }

   function time () {
      s++;
      console.log(Math.floor((s/60)/60 % 60) + ":" + Math.floor((s/60) % 60) + ":" + Math.floor(s % 60));
   }

   $('#fader').on("input", function(val){
      $('#volume').html(val.target.value);
      $('#fader').attr('value', val.target.value);
   });




