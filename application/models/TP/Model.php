<?php
namespace TP;
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 7/11/15
 * Time: 4:49 PM
 */

Class Model{
	public function __call($name, $args) {
		if (preg_match('!(get|set)(\w+)!', $name, $match)) {
			$prop = $match[2];
			if ($match[1] === 'get') {
				if (count($args) != 0) {
					throw new Exception("Method '$name' expected 0 arguments, got " . count($args)."\n");
				}
				return $this->$prop;
			} else {
				if (count($args) != 1) {
					throw new Exception("Method '$name' expected 1 argument, got " . count($args)."\n");
				}
				$this->$prop = $args[0];
			}
		} else {
			throw new Exception("Unknown method $name");
		}
	}
}