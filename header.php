<script type="text/javascript">
	// MATTSTER UTM CODE
	jQuery(document).ready(function() {
		
	<?php
	
	if (!session_id()) 
	{
		session_start();
	}
	
	if (!isset($_SESSION['googy'])) 
	{
		$_SESSION['googy'] =  $_SERVER["QUERY_STRING"]; 
	}
	
	/*if (isset ($_SESSION['googy']) )
		$goo .= $_SESSION['googy'];*/
	
	?>
	
	// show once
	//var query = location.search.substring(1);
	var query = '<?php if(!empty($_SESSION['googy'])) { echo $_SESSION['googy']; } ?>';
	query = query.replace(/%20/g," ");
	query = query.replace(/%21/g,"!");
	query = query.replace(/%22/g,'"');
	query = query.replace(/%23/g,"#");
	query = query.replace(/%24/g,"$");
	query = query.replace(/%25/g,"%");
	query = query.replace(/%26/g,"&");
	query = query.replace(/%27/g,"'");
	query = query.replace(/%28/g,"(");
	query = query.replace(/%29/g,")");
	query = query.replace(/%2A/g,"*");
	query = query.replace(/%2B/g,"+");
	query = query.replace(/%2C/g,",");
	query = query.replace(/%2D/g,"-");
	query = query.replace(/%2E/g,".");
	query = query.replace(/%2F/g,"/");
	
	// place all query string parameters in JSON
	var parameters = {};
	
	//if (location.search.substring(1).length) {
	//if (jQuery.cookie("googy").length) {
	//if (query.length) {
	if (query) {
		//var search_arr = location.search.substring(1).split("&");
		//var search_arr = jQuery.cookie("googy").split("&");
		var search_arr = query.split("&");
		for (var item in search_arr) {
			//if (search_arr[item].length) {
			if (search_arr[item]) { // lose this question if you want to send empty parameters
				var item_arr = search_arr[item].split("=");
				//if (item_arr[1].length) {
				if (item_arr[1]) {
                parameters[item_arr[0]] = item_arr[1];
				}
			}
		}
	}
	
	// If there are any values, do what you want to with them
	if (JSON.stringify(parameters) != '{}') {
		// Do it generically
		for (var prop in parameters) {
			jQuery("#" + prop).val(parameters[prop]);
		}

	}
	});
	</script>
