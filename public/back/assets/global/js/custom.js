$(document).ready(function() {    
    
    Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Login.init();
  	Demo.init();
       // init background slide images
   
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
});
    /* Start Js Page [ Photos - Admin Panel ] */
	function do_login(url) {
   		$('button').prop("disabled", true);
   		$('input').prop("disabled", true);
   		$('#notify').show();

   		$.post( url , { email: $('#email').val() , password: $('#password').val() }).done(function( data )
		{
		  	if(data.scode == 401)
		  	{
		  		$('#login-status').removeClass('info');
		  		$('#login-status-icon-container').find('i').removeClass('fa-spinner fa-pulse');
		  		$('#login-status-icon-container').find('i').addClass('fa-times-circle');
		  		$('#login-status-message').html('');
		  		$.each(data.errors, function(k, v) {
				    $('#login-status-message').append('<li>'+v+'</li>')
				});
				$('button').prop("disabled", false);
					$('input').prop("disabled", false);
		  	}else if(data.scode == 202){
		  		$('#login-status').removeClass('info');
	  			$('#login-status').addClass('success');
	  			$('#login-status-icon-container').find('i').removeClass('fa-spinner fa-pulse');
		  		$('#login-status-icon-container').find('i').addClass('fa-check-circle');
		  		$('#login-status-message').html('');
			    $.each(data.msg, function(k, v) {
				    $('#login-status-message').append('<li>'+v+'</li>')
				});
				setTimeout(function(){ location.reload(); }, 4000);
				
		  	}else{
		  		$('#login-status').removeClass('info');
		  		$('#login-status-icon-container').find('i').removeClass('fa-spinner fa-pulse');
		  		$('#login-status-icon-container').find('i').addClass('fa-check-circle');
		  		$('#login-status-message').html('');
			    $('#login-status-message').append('<li>Some Error Happened</li>')
				$('button').prop("disabled", false);
				$('input').prop("disabled", false);
		  	}
  		});
	}	
