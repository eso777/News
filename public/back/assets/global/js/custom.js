$(document).ready(function() {    

    $(".messages-wrapper").niceScroll({
    	cursorcolor:"rgba(0, 0, 0, 0.3)",
    	cursorwidth:'10px',
    	bouncescroll:true,
    });

    
    Metronic.init(); // init metronic core components
	//Layout.init(); // init current layout
	// Login.init();
  	//Demo.init();
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
    /* End Js Page [ Photos - Admin Panel ] */

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
/**************************Chat JS****************************/
function open_window(id) {
	
}

function chat_list_toggle() {
	if($('#main_list').hasClass('mini')){
		$('#main_list').animate({
		  height: "436px",
		});
		$('#main_list').removeClass('mini');
		
	}else{
		$('#main_list').animate({
		  height: "35px",
		});
		$('#main_list').addClass('mini');
	}
}

function chat_window_minimize(id) {
	if($('#window_'+id).hasClass('mini'))
	{
		$('#window_'+id).animate({
		  height: "295px"
		});
		$('#window_'+id).removeClass('mini');
	}else{
		$('#window_'+id).animate({
		  height: "35px"
		});
		$('#window_'+id).addClass('mini');
	}
}

function close_window(id) {
	$('#window_'+id).remove();
}
/**************************Chat JS****************************/


/* NEw Chat JS */
/*
$(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('focus', '.panel-footer input.chat_input', function (e) {
    var $this = $(this);
    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideDown();
        $('#minim_chat_window').removeClass('panel-collapsed');
        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});

$(document).on('click', '#new_chat', function (e) {
    var size = $( ".chat-window:last-child" ).css("margin-left");
   //  size_total = parseInt(size) + 400;
    var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
    //clone.css("margin-left", size_total);
});

$(document).on('click', '.icon_close', function (e) {
    $(this).parent().parent().parent().parent().remove();
   // $(this).remove();
});


/* NEw Chat JS */

/* Toggle Menu */
/* $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
*/
/* Toggle Menu */
