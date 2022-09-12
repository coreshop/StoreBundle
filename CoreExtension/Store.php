<?php

declare(strict_types=1);

/*
 * CoreShop
 *
 * This source file is available under two different licenses:
 *  - GNU General Public License version 3 (GPLv3)
 *  - CoreShop Commercial License (CCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GPLv3 and CCL
 *
 */

namespace CoreShop\Bundle\StoreBundle\CoreExtension;

use CoreShop\Bundle\ResourceBundle\CoreExtension\Select;
use CoreShop\Component\Store\Model\StoreInterface;

/**
 * @psalm-suppress InvalidReturnType, InvalidReturnStatement
 */
class Store extends Select
{
    /**
     * Static type of this element.
     *
     * @var string
     */
    public $fieldtype = 'coreShopStore';

    protected function getRepository()
    {
        return \Pimcore::getContainer()->get('coreshop.repository.store');
    }

    protected function getModel(): string
    {
        return \Pimcore::getContainer()->getParameter('coreshop.model.store.class');
    }

    protected function getInterface(): string
    {
        return '\\' . StoreInterface::class;
    }

    protected function getNullable(): bool
    {
        return true;
    }

    public function getOptionsProviderClass()
    {
        return '@' . StoreOptionProvider::class;
    }
}
