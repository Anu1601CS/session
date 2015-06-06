<?php
/**
 * Part of the Joomla Framework Session Package
 *
 * @copyright  Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Session;

/**
 * Interface defining a Joomla! Session object
 *
 * @since  __DEPLOY_VERSION__
 */
interface SessionInterface extends \IteratorAggregate
{
	/**
	 * Get current state of session
	 *
	 * @return  string  The session state
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function getState();

	/**
	 * Get expiration time in minutes
	 *
	 * @return  integer  The session expiration time in minutes
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function getExpire();

	/**
	 * Get the session name
	 *
	 * @return  string  The session name
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function getName();

	/**
	 * Get the session ID
	 *
	 * @return  string  The session ID
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function getId();

	/**
	 * Shorthand to check if the session is active
	 *
	 * @return  boolean
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function isActive();

	/**
	 * Check whether this session is newly created
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function isNew();

	/**
	 * Get data from the session store
	 *
	 * @param   string  $name       Name of a variable
	 * @param   mixed   $default    Default value of a variable if not set
	 * @param   string  $namespace  Namespace to use, default to 'default'
	 *
	 * @return  mixed  Value of a variable
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function get($name, $default = null, $namespace = 'default');

	/**
	 * Set data into the session store
	 *
	 * @param   string  $name       Name of a variable.
	 * @param   mixed   $value      Value of a variable.
	 * @param   string  $namespace  Namespace to use, default to 'default'.
	 *
	 * @return  mixed  Old value of a variable.
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function set($name, $value = null, $namespace = 'default');

	/**
	 * Check whether data exists in the session store
	 *
	 * @param   string  $name       Name of variable
	 * @param   string  $namespace  Namespace to use, default to 'default'
	 *
	 * @return  boolean  True if the variable exists
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function has($name, $namespace = 'default');

	/**
	 * Unset a variable from the session store
	 *
	 * @param   string  $name       Name of variable
	 * @param   string  $namespace  Namespace to use, default to 'default'
	 *
	 * @return  mixed   The value from session or NULL if not set
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function remove($name, $namespace = 'default');

	/**
	 * Clears all variables from the session store
	 *
	 * @return  void
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function clear();

	/**
	 * Start a session
	 *
	 * @return  void
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function start();

	/**
	 * Frees all session variables and destroys all data registered to a session
	 *
	 * This method resets the $_SESSION variable and destroys all of the data associated
	 * with the current session in its storage (file or DB). It forces new session to be
	 * started after this method is called. It does not unset the session cookie.
	 *
	 * @return  boolean  True on success
	 *
	 * @see     session_destroy()
	 * @see     session_unset()
	 * @since   __DEPLOY_VERSION__
	 */
	public function destroy();

	/**
	 * Restart an expired or locked session
	 *
	 * @return  boolean  True on success
	 *
	 * @see     destroy
	 * @since   __DEPLOY_VERSION__
	 */
	public function restart();

	/**
	 * Create a new session and copy variables from the old one
	 *
	 * @return  boolean $result true on success
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function fork();

	/**
	 * Writes session data and ends session
	 *
	 * Session data is usually stored after your script terminated without the need
	 * to call SessionInterface::close(), but as session data is locked to prevent concurrent
	 * writes only one script may operate on a session at any time. When using
	 * framesets together with sessions you will experience the frames loading one
	 * by one due to this locking. You can reduce the time needed to load all the
	 * frames by ending the session as soon as all changes to session variables are
	 * done.
	 *
	 * @return  void
	 *
	 * @see     session_write_close()
	 * @since   __DEPLOY_VERSION__
	 */
	public function close();
}
