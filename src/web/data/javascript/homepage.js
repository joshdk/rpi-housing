
$().ready(function() {	
	mboxStatus( '#roomStatus', 'pages/popup_roomStatus.php', 'Room Status' );
	mboxCreate( '#createAdmin', 'pages/popup_createAdmin.php', 'Create Admin' );
	mboxStudent( '#adminCheckStatus', 'pages/popup_adminCheckStatus.php', 'Student Status' );
});	

//Opens jQuery UI Dialog Box For the Lottery Status
function mboxStatus( trigger, source, title ) {
			
	$(trigger).click(
		function (){		
			//define config object
			$.fx.speeds._default = 500;
			var dialogOpts = {
					title: title,
					modal: true,
					autoOpen: false,
					show: "blind",
					closeOnEscape: true,
					draggable: false,
					resizable: false,
					height: 140,
					width: 400,
					open: function() {
					//display correct dialog content
					$("#dialog-message1").load(source);}
					};
			$("#dialog-message1").dialog(dialogOpts);    //end dialog
			$("#dialog-message1").dialog("open");
			return false;
		}
	);				
}

//Opens jQuery UI Dialog Box For the Create Admin
function mboxCreate( trigger, source, title ) {
			
	$(trigger).click(
		function (){		
			//define config object
			$.fx.speeds._default = 500;
			var dialogOpts = {
					title: title,
					modal: true,
					autoOpen: false,
					show: "blind",
					closeOnEscape: true,
					draggable: false,
					resizable: false,
					height: 100,
					width: 400,
					open: function() {
					//display correct dialog content
					$("#dialog-message2").load(source);}
					};
			$("#dialog-message2").dialog(dialogOpts);    //end dialog
			$("#dialog-message2").dialog("open");
			return false;
		}
	);				
}

//Opens jQuery UI Dialog Box For the Create Admin
function mboxStudent( trigger, source, title ) {
			
	$(trigger).click(
		function (){		
			//define config object
			$.fx.speeds._default = 500;
			var dialogOpts = {
					title: title,
					modal: true,
					autoOpen: false,
					show: "blind",
					closeOnEscape: true,
					draggable: false,
					resizable: false,
					height: 120,
					width: 400,
					open: function() {
					//display correct dialog content
					$("#dialog-message3").load(source);}
					};
			$("#dialog-message3").dialog(dialogOpts);    //end dialog
			$("#dialog-message3").dialog("open");
			return false;
		}
	);				
}

		



