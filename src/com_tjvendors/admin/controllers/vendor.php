<?php
/**
 * @version    SVN:
 * @package    Com_Tjvendors
 * @author     Techjoomla <contact@techjoomla.com>
 * @copyright  Copyright  2009-2017 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Vendor controller class.
 *
 * @since  1.6
 */
class TjvendorsControllerVendor extends JControllerForm
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'vendors';
		$this->input = JFactory::getApplication()->input;

		if (empty($this->client))
		{
			$this->client = $this->input->get('client', '');
		}

		parent::__construct();
	}

	/**
	 * Gets the URL arguments to append to an item redirect.
	 *
	 * @param   integer  $recordId  The primary key id for the item.
	 * @param   string   $urlVar    The name of the URL variable for the id.
	 *
	 * @return  string  The arguments to append to the redirect URL.
	 *
	 * @since   1.6
	 */
	protected function getRedirectToItemAppend($recordId = null, $urlVar = 'vendor_id')
	{
		$currencies = $this->input->get('currency', '', 'ARRAY');
		$currUrl = "";

		foreach ($currencies as $currency)
		{
			$currUrl .= "&currency[]=" . $currency;
		}

		$append = parent::getRedirectToItemAppend($recordId, $urlVar);
		$append .= '&client=' . $this->client . $currUrl;

		return $append;
	}

	/**
	 * Gets the URL arguments to append to a list redirect.
	 *
	 * @return  string  The arguments to append to the redirect URL.
	 *
	 * @since   1.6
	 */
	protected function getRedirectToListAppend()
	{
		$currencies = $this->input->get('currency', '', 'ARRAY');
		$currUrl = "";

		foreach ($currencies as $currency)
		{
			$currUrl .= "&currency[]=" . $currency;
		}

		$append = parent::getRedirectToListAppend();
		$append .= '&client=' . $this->client . $currUrl;

		return $append;
	}
}
