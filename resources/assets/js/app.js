
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./jquery-ui.min');
require('./jquery.dataTables.min.js');


$( document ).ready(function() {

    $( "#datepicker" ).datepicker({            
	    changeMonth: true,
	    changeYear: true ,
	    yearRange: "-115:+0",  
	});

	$( "#datepicker2" ).datepicker({            
	    changeMonth: true,
	    changeYear: true ,
	    yearRange: "-115:+5",       
	});

	$( "#datepicker3" ).datepicker({            
	    changeMonth: true,
	    changeYear: true ,
	    yearRange: "-115:+5",       
	});

	$( "#datepicker4" ).datepicker({            
	    changeMonth: true,
	    changeYear: true ,
	    yearRange: "-115:+5",       
	});

	$( "#datepicker5" ).datepicker({            
	    changeMonth: true,
	    changeYear: true ,
	    yearRange: "-115:+5",       
	});
});

// add another item script 

	$(document).ready(function() {
	    var max_fields      = 10; //maximum input boxes allowed
	    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
	    var add_button      = $(".add_field_button"); //Add button ID
	    
	    var x = 1; //initlal text box count
	    $(add_button).click(function(e){ //on add input button click
	        e.preventDefault();
	        if(x < max_fields){ //max input box allowed
	            x++; //text box increment
	            $(wrapper).append('<div><input type="file" name="images[]" class="form-control"/><a href="#" class="remove_field btn btn-xs btn-danger">حذف</a></div>'); //add input box
	        }
	    });
	    
	    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	        e.preventDefault(); $(this).parent('div').remove(); x--;
	    })
	});

// bootstrap-select

