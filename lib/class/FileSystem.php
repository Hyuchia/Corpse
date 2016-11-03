<?php

	/**
	 * ==============================
	 * File System
	 * ==============================
	 */

	class FileSystem {

		/**
		 * Recursively search for a file inside a directory
		 *
		 * Searches for a file by it's name inside a directory in a recursive
		 * way, which will return the full path to it if found.
		 *
		 * @param string $directory | Directory in which the search will begin
		 * @param string $file | Name of the file to find
		 *
		 * @return string or null | String of the path to the file or null
		 * if it's not found.
		 */
		public static function findFile($directory, $file){
			$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory), RecursiveIteratorIterator::SELF_FIRST);
			foreach($objects as $name => $object){
				if($object -> getFileName() == $file){
					return $name;
				}
			}
			return null;
		}

	}
?>
