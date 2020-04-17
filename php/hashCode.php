<?php
					//$key = md5('australia');
					$salt = md5('australia');
					
					//Encrypt
					function encrypt($string,$key){
						$string = rtrim(base64_encode(mcrypt_encrypt(MCRIPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
					}//Decrypt
					
					function decrypt($string,$key){
						$string = rtrim(mcrypt_encrypt(MCRIPT_RIJNDAEL_256, $key, base64_encode($string), MCRYPT_MODE_ECB));
					}
					
					function hashword($sting, $salt){
						$string = crypt($strig, '$1$'.$salt.'$');
					}
					?>