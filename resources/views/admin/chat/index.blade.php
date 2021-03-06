{!! Html::script("back/assets/global/plugins/jquery.min.js") !!}
{!! Html::style('back/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css') !!}

<script type="text/javascript">
	
	$(document).on('keydown', '.send', function(e) {
		var msg = $(this).val();
		
		if (e.keyCode == 13 && !e.shiftKey && !$.trim(msg) == "") {
				
			$.ajax({
				url:'{{url("admin/get/add")}}',
				type :'post',
				data : {_token:'{{csrf_token()}}', msg:msg },

			});		

			$(this).val("") ;	
		};


	});
		$(function(){

			liveChat();
		});
	
		function liveChat()
		{

			$.ajax({
				url: '{{url("admin/get/ajax")}}',
				data : {_token:'{{csrf_token()}}'},
				success:function(data){
				
				$('.chat-box').append('<div class="alert alert-info">'+ data['message'] +'</div>');
					setTimeout(liveChat,1000);	
				},
				error:function(){
					setTimeout(liveChat,5000);	
				}
			});
		}
		// End Function 

	//var timer = 0;
		function reduceTimer(){
			timer = timer - 1;
			isTyping(true);
		}	

		function isTyping(val){
			
			if(val == 'true'){
			document.getElementById('typing_on').innerHTML = "Admin is typing...";
			}else{
				/*console.log(timer) ;*/
				if(timer <= 0){
				document.getElementById('typing_on').innerHTML = "No one is typing at the moment.";
				}else{
				 setTimeout("reduceTimer();",500);
				}
			}
		}
</script>

<div class="container row">
	<div class="col-md-6 " style="margin:200px 0px 0px 200px">
		<div class="chat-box">
			@foreach ($tests as $test) 
				<div class="alert alert-info">{{$test->message}}</div>
			@endforeach
		</div>
		<input type="text" name="" value="" class="form-control send" onkeypress="isTyping('true'); timer=5;" onkeyup="isTyping('false')" timer=5> 
		<div id="typing_on">No one is typing at the moment.</div>
	</div>
</div>






















































<!-- <div class="col-md-12">
	New Code Caht
	<div id="wrapper">
		Sidebar
		<div id="sidebar-wrapper">
			<a href="#" >
				<i class="fa fa-power-off" aria-hidden="true"></i>
			</a>
			
			<ul class="sidebar-nav">
				<li class="sidebar-brand">
					<span href="#">
						Journalistis Accounts
					</span>
				</li>
				<li id="new_chat">
					<a href="#">Eslam</a>
				</li>
				<li id="new_chat">
					<a href="#">Ahmed Gad 2r2osha</a>
				</li>
				<li id="new_chat">
					<a href="#">سعيد الهوا</a>
				</li>
				<li id="new_chat">
					<a href="#">Eslam bek basha</a>
				</li>
				Admins Area
				<li class="sidebar-brand">
					<span href="#">
						Admins Accounts
					</span>
				</li>
				<li id="new_chat">
					<a href="#">Eslam</a>
				</li>
				<li id="new_chat">
					<a href="#">Ahmed Gad 2r2osha</a>
				</li>
				<li id="new_chat">
					<a href="#">سعيد الهوا</a>
				</li>
				<li id="new_chat">
					<a href="#">Eslam bek basha</a>
				</li>
				
			</ul>
		</div>
		/#sidebar-wrapper
		Page Content
		Toggle Menu
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<a href="#menu-toggle" class="btn btn-success" id="menu-toggle">بدء محادثة جديدة</a>
					</div>
				</div>
			</div>
		</div>
		/#page-content-wrapper
	</div>
	
	Menu Toggle Script
	<div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-left:10px;">
		<div class="col-xs-12 col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading top-bar">
					<div class="col-md-8 col-xs-8">
						<h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - Miguel</h3>
					</div>
					<div class="col-md-4 col-xs-4" style="text-align: right;">
						<a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
						<a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
					</div>
				</div>
				<ul class="messages panel-body"><li class="message left appeared"><div class="avatar"></div><div class="text_wrapper"><div class="text">Hello Philip! :)</div></div></li><li class="message right appeared"><div class="avatar"></div><div class="text_wrapper"><div class="text">Hi Sandy! How are you?</div></div></li><li class="message right appeared"><div class="avatar"></div><div class="text_wrapper"><div class="text">Hi Sandy! How are you?</div></div></li><li class="message right appeared"><div class="avatar"></div><div class="text_wrapper"><div class="text">Hi Sandy! How are you?</div></div></li><li class="message left appeared"><div class="avatar"></div><div class="text_wrapper"><div class="text">I'm fine, thank you!</div></div></li></ul>
				
				<div class="panel-footer">
					<div class="input-group">
						<input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="... Write your message here" />
						<span class="input-group-btn">
							<button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	Set Btn chat design
	<div class="btn-group dropup">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			<span class="glyphicon glyphicon-cog"></span>
			<span class="sr-only">Toggle Dropdown</span>
			</button>
			<ul class="dropdown-menu" role="menu">
					<li><a href="#" id="new_chat"><span class="glyphicon glyphicon-plus"></span> Novo</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-list"></span> Ver outras</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-remove"></span> Fechar Tudo</a></li>
					<li class="divider"></li>
					<li><a href="#"><span class="glyphicon glyphicon-eye-close"></span> Invisivel</a></li>
					<li><a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a></li>
			</ul>
	</div>
</div> -->