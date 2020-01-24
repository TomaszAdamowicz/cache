<?php
/**
 * Transient driver
 *
 * @package micropackage/internationalization
 */

namespace Micropackage\Cache\Driver;

use Micropackage\Cache\Traits;

/**
 * Transient driver
 */
class Transient {

	use Traits\Expiration;

	/**
	 * Constructor
	 *
	 * @since [Next]
	 * @param int $expiration Expiration in seconds, default: not expiring.
	 */
	public function __construct( $expiration = 0 ) {
		$this->set_expiration( (int) $expiration );
	}

	/**
	 * Sets cache value
	 *
	 * @since  [Next]
	 * @param  mixed $value Value to store.
	 * @return void
	 */
	public function set( $value ) {
		set_transient( $this->get_key(), $value, $this->get_expiration() );
	}

	/**
	 * Adds cache if it's not already set
	 *
	 * @since  [Next]
	 * @param  mixed $value Value to store.
	 * @return void
	 */
	public function add( $value ) {
		if ( false === $this->get() ) {
			$this->set( $value );
		}
	}

	/**
	 * Gets value from cache
	 *
	 * @since  [Next]
	 * @return mixed|false Cached value or false if not set
	 */
	public function get() {
		return get_transient( $this->get_key() );
	}

	/**
	 * Deletes value from cache
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function delete() {
		delete_transient( $this->get_key() );
	}

}