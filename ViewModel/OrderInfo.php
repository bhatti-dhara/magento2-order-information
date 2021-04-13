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

namespace Mage2\OrderInfo\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Mage2\OrderInfo\Model\Config;

/**
 * Class OrderInfo
 */
class OrderInfo implements ArgumentInterface
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * OrderInfo constructor.
     *
     * @param Config $config
     */
    public function __construct(
        Config $config
    ) {
        $this->config = $config;
    }

    /**
     * Get module enabled value from admin configuration
     *
     * @return bool|int|string
     */
    public function isModuleEnable()
    {
        return $this->config->isModuleEnabled();
    }
}
