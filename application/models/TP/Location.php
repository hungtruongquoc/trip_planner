<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 7/8/15
 * Time: 9:12 PM
 */
namespace TP;
use Doctrine\ORM\Mapping\Id;

/**
 * @Entity
 * @Table(name="location", options={"collate"="utf8_bin", "charset"="utf8"})
 */
class Location extends Model {
	/**
	 * @Id
	 * @Column(type="bigint", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	protected $Id;
	/**
	 * @Column(type="string", length=255, nullable=false)
	 */
	protected $Name;
	/**
	 * @Column(type="text", nullable=true)
	 */
	protected $Description;
}