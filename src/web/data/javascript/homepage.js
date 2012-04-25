
$().ready(function() {	
	$("#dialog-message").html('');
	mboxStatus( '#roomStatus', 'pages/popup_roomStatus.php', 'Room Status' );
	mboxCreate( '#createAdmin', 'pages/popup_createAdmin.php', 'Create Admin' );
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
					$("#dialog-message").load(source);}
					};
			$("#dialog-message").dialog(dialogOpts);    //end dialog
			$("#dialog-message").dialog("open");
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
					height: 140,
					width: 400,
					open: function() {
					//display correct dialog content
					$("#dialog-message").load(source);}
					};
			$("#dialog-message").dialog(dialogOpts);    //end dialog
			$("#dialog-message").dialog("open");
			return false;
		}
	);				
}

		



