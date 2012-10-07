<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Password confirm driver.
 * 
 * @package		Gaps
 * @author		David Stutz
 * @copyright	(c) 2012 David Stutz
 * @license		http://www.gnu.org/licenses/gpl-3.0
 */
class Kohana_Gaps_Driver_Password_Confirm extends Kohana_Gaps_Driver
{
	
	/**
	 * @var	string	used view
	 */
	protected $_view = 'password/confirm';

	/**
	 * Load to load value.
	 * 
	 * @param	object	model
	 * @param	array 	post
	 */
	public function load($model, $post)
	{
		$model->{$this->_field} = $post[$this->_field];
	}
}