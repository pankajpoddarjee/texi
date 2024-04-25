<script>
function copyUrl(e) {
	var url = $(e).data('url');
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val(url).select();
	try {
		document.execCommand("copy");
		alert('success', 'Link copied to clipboard');
	} catch (err) {
		alert('danger', 'Oops, unable to copy');
	}
	$temp.remove();
}

</script>