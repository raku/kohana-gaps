<?php defined('SYSPATH') or die('No direct script access.');

/**
 * File driver.
 * 
 * @package		Gaps
 * @author		David Stutz
 * @copyright	(c) 2012 David Stutz
 * @license		http://www.gnu.org/licenses/gpl-3.0
 */
class Kohana_Gaps_Driver_File extends Kohana_Gaps_Driver
{
	
	/**
	 * @var	string	used view
	 */
	protected $_view = 'file';

	/**
	 * @var	array 	files array
	 */
	protected $_files = array();
	
	/**
	 * @var	object	model
	 */
	protected $_model;
	 	
	/**
	 * Load to load value.
	 * 
	 * @param	object	model
	 * @param 	array 	post
	 */
	public function load($model, $files)
	{
		$this->_files = $files;
		$this->_model = $model;
	}
	
	/**
	 * The main action: saving or processing the files is done in save_rels.
	 * 
	 * @throws	Kohana_Exception
	 * @uses	Upload
	 */
	public function save_rels()
	{
		/**
		 * Files array is directly accessed.
		 */
		if ($this->_options['store'])
		{
			/**
			 * Create dir if allowed.
			 */
			if (!is_dir($this->_options['store']))
			{
				if (!$this->_options['create'])
				{
					throw new Kohana_Exception('Gaps: Directory ' . $this->_options['store'] . ' does not exist.');
				}
				else
				{
					mkdir($this->_options['store'], '0777', TRUE);
				}
			}
			
			/**
			 * If directory is not writable throw exception.
			 */
			if (!is_writable($this->_options['store']))
			{
				throw new Kohana_Exception('Gaps: Directory ' . $this->_options['store'] . ' must be writable.');
			}
			
			Upload::save($this->_files[$this->_field], $this->_files[$this->_field]['name'], $this->_options['store']);
			
			$this->_model->{$this->_field} = $this->_files[$this->_field]['name'];
			$this->_model->save();
		}
		if ($this->_options['call'])
		{
			
		}
	}
}