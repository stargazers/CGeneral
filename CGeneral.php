<?php

	class CGeneral
	{
		// **************************************************
		//	createRandomString
		/*!
			@brief Generate random alphanumeric string.
			  This can be used in password generations,
			  shorturls and so on.

			@param $len Length of string to generate

			@return Random alpahnumeric string.
		*/
		// **************************************************
		public function createRandomString( $len )
		{   
			// Characters what can be in random string
			$ok_val = array();

			// Add number 0-9 
			for( $i=0; $i<10; $i++ )
				$ok_val[] = $i; 

			// Add characters A to Z
			for( $i=65; $i<91; $i++ )
				$ok_val[] = chr( $i );

			// Add characters a to z
			for( $i=97; $i<123; $i++ )
				$ok_val[] = chr( $i );

			$text = ''; 
			$max = count( $ok_val );

			// Create correct lenght random string
			while( true )
			{
				$text .= $ok_val[mt_rand( 0, $max )]; 

				if( strlen( $text ) == $len )
					break;
			}
		
			return $text;
		}  

		// **************************************************
		//	checkRequiredFields
		/*!
			@brief Checks if all required fields are set

			@param $arr Array where we search.

			@param $fields Required fields. This must be array too!

			@return True = All fields are set, 
			  false = All fields are not set.
		*/
		// **************************************************
		public function checkRequiredFields( $arr, $fields )
		{
			foreach( $fields as $field )
			{
				if(! isset( $arr[$field] ) )
					return false;
			}

			return true;
		}

		// **************************************************
		//	datetimeToFinnish
		/*!
			@brief Convert YYYY-MM-DD H:i:s to finnish
			  way, eg. Date.Month.Year H:i:s

			@param $dt Datetime

			@return Finnish datetime format.
		*/
		// **************************************************
		public function datetimeToFinnish( $dt )
		{
			return date( 'd.m.Y H:i:s', strtotime( $dt ) );
		}

		// **************************************************
		//	dateToFinnish
		/*!
			@brief Convert YYYY-MM-DD to finnish
			  way, eg. Date.Month.Year 

			@param $dt Datetime

			@return Finnish datetime format.
		*/
		// **************************************************
		public function dateToFinnish( $d )
		{
			return date( 'd.m.Y', strtotime( $d ) );
		}
	}

?>
