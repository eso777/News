$(document).ready(function() {    
    
    /* Start Trigger Init() [ With - admin panel Metronic ] */ 

    Metronic.init();    // init metronic core components
	Layout.init();    // init current layout
	Demo.init();    // init demo features
    ComponentsFormTools.init();

    /* End Trigger Init() [ With - admin panel Metronic ] */ 
    
    /*******************************************************
      ***                                               ***
    		*** Start Custom Js [ Admin Panle ] ******
      ***												***
    /*******************************************************
		
	/* Start My Custom js framework  */	
		
		/* Start Add More Input File To add more images */
			var max_fields      = 15;
			var wrapper         = '.contant-images-file';
			var add_button      = '#img-file-plus';

			var x = 1 ;
			$('#img-file-plus').click(function(e) {
				e.preventDefault();

				if(x < max_fields )
				{
					x++ ;
					$(wrapper).append('<tr> <td> <label class="control-label label-info" id="my_label">صوره '+ x +'  <i class="remove_field fa fa-close fa-1x" style="cursor:pointer"> حذف </i> </label> </td> <td><div  class="col-md-11"> <input name="img[]" type="file"> <small class="text-danger"></small> </div></td> </tr>');//add input box

				}else{

					$('#msg_err').fadeIn('fast', function() {
						$(this).delay(5000).fadeOut('slow');
					});
				}

			});
			$(wrapper).on("click",".remove_field", function(e){ //user click on remove text

				var remo = $(this).parent().parent().parent().fadeOut('slow').remove();
				x--;
			});
		/* End Add More Input File To add more images */

	/* End My Custom js framework  */	



    /* Start Js Page [ Photos - Admin Panel ] */

    	$('#arrow').click(function() {
 				
 			$('.img-section').fadeToggle('200', function() {
 			
	 			if($('#arrow').attr('class') == 'fa fa-arrow-circle-o-down' )
	 			{
	 				$('#arrow').attr('class','fa fa-arrow-circle-o-right') ;
	 			}else
	 			{
	 				$('#arrow').attr('class','fa fa-arrow-circle-o-down') ;
	 			}	
 				
 			});

    	});

    /* Start Js Page [ Photos - Admin Panel ] */


});