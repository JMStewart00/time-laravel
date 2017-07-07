
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$('#fader').on("input", function(val){
   $('#volume').html(val.target.value);
   $('#fader').attr('value', val.target.value);
});