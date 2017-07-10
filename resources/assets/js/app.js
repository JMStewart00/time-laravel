
$('#fader').on("input", function(val){
   $('#volume').html(val.target.value);
   $('#fader').attr('value', val.target.value);
});

