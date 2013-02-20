/**
 * 
 */
function likedislike(field_id){
	var base_url = $("#mybaseurl").val();
	$.post( base_url, {field_id:field_id} ,
	function(data) {
			if(data.status==true){
				$("#displaytext_"+field_id).html(data.displaytext);
				$("#likedislikecount_"+field_id).html(data.count);
			}
	},'json');
}