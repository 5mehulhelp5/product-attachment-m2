<?php
/**
 * Mavenbird Technologies Private Limited
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://mavenbird.com/Mavenbird-Module-License.txt
 *
 * =================================================================
 *
 * @category   Mavenbird
 * @package    Mavenbird_ProductAttachment
 * @author     Mavenbird Team
 * @copyright  Copyright (c) 2018-2024 Mavenbird Technologies Private Limited ( http://mavenbird.com )
 * @license    http://mavenbird.com/Mavenbird-Module-License.txt
 */ 

namespace Mavenbird\ProductAttachment\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * AttachProduct Model
 */
class AttachProduct extends AbstractModel
{
    /**
     * Init Attach Product
     */
    protected function _construct()
    {
        $this->_init(\Mavenbird\ProductAttachment\Model\ResourceModel\AttachProduct::class);
    }
}