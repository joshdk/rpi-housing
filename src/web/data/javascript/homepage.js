
$().ready(function() {	
	mboxLottery( '#lotteryStatus', 'pages/popup_lotteryStatus.php', 'Lottery Status' );
	mbox( '#roomInvites', 'pages/popup_roomInvites.php', 'View Queue' );
	mbox( '#viewQueue', 'pages/popup_viewQueue.php', 'Room Invites' ); 
	mbox( '#searchFriends', 'pages/popup_searchFriends.php', 'Search Friends' ); 
});	

//Opens jQuery UI Dialog Box For the Lottery Status
function mboxLottery( trigger, source, title ) {
			
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
					height: 165,
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

//Opens jQuery UI Dialog Box
function mbox( trigger, source, title ) {
			
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
					height: 700,
					width: 700,
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



