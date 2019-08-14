<?php
/**
 * Magento
 *
 * Author: Magerips
 * Website: www.magerips.com 
 * Suport Email: support@magerips.com
 *
**/
class Rp_Newsletterunsubscribe_Block_Newsletterunsubscribeoverride extends Mage_Core_Block_Template
{
	public function getNewsletterunsubscribeFormActionUrl()
	{
		return $this->getUrl("newsletterunsubscribe/index/newsletterunsubscribecus");
	} 
}