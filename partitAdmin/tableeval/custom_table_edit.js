$(document).ready(function(){
	$('#data_table').Tabledit({
		deleteButton: false,
		editButton: false,   		
		columns: {
		  identifier: [0, 'id'],                    
		  editable: [[4, 'fin']]
		},
		hideIdentifier: true,
		url: 'live_edit.php'		
	});
});