<?php 

/**
 * 
 */
class TesttaskFlexGetData {	
	
	public static function discountPercentage( $prod ) {
		if ($prod->sale_price){
			return 'знижка: '.round( ( ( $prod->regular_price - $prod->sale_price ) / $prod->regular_price ) * 100 ).'%';
		}
		return false;
	}

}