<?php
/**
 * FotoFixture
 *
 */
class FotoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'url' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'parent_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'lft' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'rght' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'produto_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'url' => 'Lorem ipsum dolor sit amet',
			'parent_id' => 1,
			'lft' => 1,
			'rght' => 1,
			'produto_id' => 1,
			'created' => '2015-01-15 01:11:14',
			'modified' => '2015-01-15 01:11:14'
		),
	);

}
