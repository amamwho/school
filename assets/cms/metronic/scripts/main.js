$(function() {
	$('a#del_img').click(function(){
		var c = confirm('ลบรูปภาพ!?');
		if(c) {
			$('div#thumb').hide();
			$('input#del').val(1);
		} else 
			return false;
	});
        $('a#del_vdo').click(function(){
		var c = confirm('ลบรูปภาพ!?');
		if(c) {
			$('div#vdo').hide();
			$('input#del_vdo').val(1);
		} else 
			return false;
	});
});
function deleteImg(name) {
    var c = confirm('ลบรูปภาพ!?');
    if(c) {
            $('div#thumb_'+name).hide();
            $('input#del_'+name).val(1);
    } else 
            return false;
}