<?php
	function vd($val) {
	  echo '<pre>';
		dd($val);
		echo '</pre>';
	}

	// Last Query
	function lq() {
		$queries = DB::getQueryLog();
		$last_query = end($queries);

		vd($last_query);
	}

?>