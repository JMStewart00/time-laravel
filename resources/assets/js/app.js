   if (Boolean($('#starts_time').length)){
      var s = 0;
      let timer = window.setInterval(time, 1000);
   }

   console.log('test');

   function time () {
      s++;
      let h = pad(Math.floor((s/60)/60 % 60)),
          m = pad(Math.floor((s/60) % 60)),
          sec = pad(Math.floor(s % 60)),
          timer = h + ":" + m + ":" + sec;
      console.log(h + ":" + m + ":" + sec);
      $('#timer span').html(timer);
   }

   function pad(d) {
    return (d < 10) ? '0' + d.toString() : d.toString();
}

   $('#fader').on("input", function(val){
      $('#volume').html(val.target.value);
      $('#fader').attr('value', val.target.value);
   });




