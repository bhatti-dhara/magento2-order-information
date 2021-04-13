<?php
/**
 * BhattiDhara
 * Copyright (C) 2021 BhattiDhara
 *
 * NOTICE OF LICENSE
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see http://opensource.org/licenses/gpl-3.0.html
 *
 * @category BhattiDhara
 * @package Mage2_OrderInfo
 * @copyright Copyright (c) 2021 BhattiDhara
 * @license http://opensource.org/licenses/gpl-3.0.html GNU General Public License,version 3 (GPL-3.0)
 * @author BhattiDhara
 */

declare(strict_types=1);

namespace Mage2\OrderInfo\Plugin\Controller\Onepage;

use Magento\Framework\Registry;
use Magento\Checkout\Model\Session;
use Mage2\OrderInfo\Model\Config;

/**
 * Class Success
 */
class Success
{

    /**
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * @var Session
     */
    protected $_checkoutSession;

    /**
     * @var Config
     */
    protected $_orderConfig;

    /**
     * Success constructor.
     *
     * @param Registry $coreRegistry
     * @param Session $checkoutSession
     * @param Config $orderConfig
     */
    public function __construct(
        Registry $coreRegistry,
        Session $checkoutSession,
        Config $orderConfig
    ) {
        $this->_coreRegistry    = $coreRegistry;
        $this->_checkoutSession = $checkoutSession;
        $this->_orderConfig     = $orderConfig;
    }

    /**
     * @param \Magento\Checkout\Controller\Onepage\Success $subject
     */
    public function beforeExecute(\Magento\Checkout\Controller\Onepage\Success $subject)
    {
        if ($this->_orderConfig->isModuleEnabled()) {
            $currentOrder = $this->_checkoutSession->getLastRealOrder();
            $this->_coreRegistry->register('current_order', $currentOrder);
        }
    }
}
