//$(function(){
$(document).ready(function(){
   $('.editor_edit_button').click(function(){
       $('#modal').modal('show')
               .find('#modalContent')
               .load($(this).attr('value'));
   });
});

