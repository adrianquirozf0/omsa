<?php
/**
 * FixFixture
 *
 */
class FixFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'vehicle_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'latitude' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,6', 'unsigned' => false),
		'longitude' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,6', 'unsigned' => false),
		'fix_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'vehicle_id' => array('column' => 'vehicle_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'vehicle_id' => 1,
			'latitude' => 1,
			'longitude' => 1,
			'fix_time' => '2015-02-13 20:37:47',
			'created' => '2015-02-13 20:37:47'
		),
	);

}
