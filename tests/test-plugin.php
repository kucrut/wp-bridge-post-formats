<?php

class Bridge_Test_Plugin extends WP_UnitTestCase {

	/**
	 * Make sure all needed classes are loaded and actions are added
	 */
	public function test_bridge_load() {
		$this->assertTrue( class_exists( 'WP_REST_Controller' ) );
		$this->assertTrue( class_exists( 'WP_REST_Terms_Controller' ) );
		$this->assertEquals( 11, has_action( 'init', '_bridge_expose_post_formats' ) );
	}


	/**
	 * @covers ::_bridge_expose_post_formats
	 */
	public function test_bridge_expose_post_formats() {

		// Bootstrap the taxonomy variables.
		_bridge_expose_post_formats();

		$taxonomy = get_taxonomy( 'post_format' );
		$this->assertTrue( $taxonomy->show_in_rest );
		$this->assertEquals( 'formats', $taxonomy->rest_base );
		$this->assertEquals( 'WP_REST_Terms_Controller', $taxonomy->rest_controller_class );
	}
}
