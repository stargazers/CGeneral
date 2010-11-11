<?php

/* 
CGeneral - General methods class.
Copyright (C) 2010 Aleksi Räsänen <aleksi.rasanen@runosydan.net>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Affero General Public License as
published by the Free Software Foundation, either version 3 of the
License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


	// **************************************************
	//	CGeneral
	/*!
		@brief General methods class for PHP.

		@author Aleksi Räsänen
			<aleksi.rasanen@runosydan.net>
	*/
	// **************************************************
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

			@param $d Datetime

			@return Finnish datetime format.
		*/
		// **************************************************
		public function dateToFinnish( $d )
		{
			return date( 'd.m.Y', strtotime( $d ) );
		}
	}

?>
