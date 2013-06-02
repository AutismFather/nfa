<?php
namespace Admin\Libraries;

class Slug {
	/**
	 * Admin/Slug::make($str, $replace = array(), $delimiter = '-'
	 * Takes any string, even with special characters and turns it into a slug for URL use
	 *
	 * @param        $str
	 * @param array  $replace
	 * @param string $delimiter
	 * @return string
	 */
	public static function make($str, $replace=array(), $delimiter='-'){
		setlocale(LC_ALL, 'en_US.UTF8');
		if( !empty($replace) ) {
			$str = str_replace((array)$replace, ' ', $str);
		}

		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

		return  strtolower(trim($clean, '-'));
	}
}