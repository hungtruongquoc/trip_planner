<?php
namespace TP;
use Doctrine\ORM\Mapping\Id;

/**
 * @Entity
 * @Table(name="trip", options={"collate"="utf8_bin", "charset"="utf8"})
 */
class Trip {
	/**
	 * @Id
	 * @Column(type="bigint", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	protected $Id;
	/**
	 * @Column(type="date", nullable=false)
	 */
	protected $DateStart;
	/**
	 * @Column(type="date", nullable=false)
	 */
	protected $DateEnd;
	/**
	 * @Column(type="string", length=255, nullable=false)
	 */
	protected $Name;
	/**
	 * @Column(type="text")
	 */
	protected $Description;

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

	/**
	 * Checks if the model contains valid data
	 *
	 * @return bool
	 */
	public function isValid(){
		if(is_null($this->DateEnd) || is_null($this->DateStart)){
			return FALSE;
		}
		return $this->DateEnd > $this->DateStart;
	}
}
