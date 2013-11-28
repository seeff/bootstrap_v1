$(document).ready(function(){
  $('input[name="Is_this_a_gift"]').change(function() {
      if(2 == $(this).val()) {
          $("#gift_fields").show();
      } else {
          $("#gift_fields").hide();
      }
  });

});