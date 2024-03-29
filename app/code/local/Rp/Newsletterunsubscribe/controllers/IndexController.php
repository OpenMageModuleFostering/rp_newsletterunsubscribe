<?php
/**
 * Magento
 *
 * Author: Magerips
 * Website: www.magerips.com 
 * Suport Email: support@magerips.com
 *
**/
class Rp_Newsletterunsubscribe_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
		$this->loadLayout();  
		$this->getLayout()->getBlock('head')->setTitle($this->__('Newsletter Unsubscription'));   
		$this->renderLayout();
    }

	/**
	* Newsletter unsubscribe from frontend
	*/
	public function newsletterunsubscribecusAction()
	{
		$email = $this->getRequest()->getParam("email");
		$subsModel = Mage::getModel("newsletter/subscriber");
		$subscriber = $subsModel->loadByEmail($email);
		
		$id = (int) $subscriber->getId();
		$code = (string) $subscriber->getCode();

		$session = Mage::getSingleton("core/session");

		if ($id && $code) {
			try {
				Mage::getModel("newsletter/subscriber")->load($id)
				->setCheckCode($code)
				->unsubscribe();
				$session->addSuccess($this->__("You have been unsubscribed."));
			}
			catch (Mage_Core_Exception $e) {
				$session->addException($e, $e->getMessage());
			}
			catch (Exception $e) {
				$session->addException($e, $this->__("There was a problem with the un-subscription."));
			}
		} else {
			$session->addError($this->__('Invalid subscription ID.'));
		}
		$this->_redirectReferer();
	} 
}