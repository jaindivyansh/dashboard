$(document).ready(function(){
	$.ajex({
		url:"http://127.0.0.1/analysis/dashboard/repeat.php",
		method:"GET",
		success: function(arr){
			},
		error:function(arr){
			console.log(arr);
		}
	});
});
		
	
	