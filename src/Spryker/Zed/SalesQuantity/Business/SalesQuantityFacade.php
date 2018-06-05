<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\SalesQuantity\Business;

use ArrayObject;
use Generated\Shared\Transfer\ItemTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Spryker\Zed\SalesQuantity\Business\SalesQuantityBusinessFactory getFactory()
 */
class SalesQuantityFacade extends AbstractFacade implements SalesQuantityFacadeInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     *
     * @return null|\ArrayObject|\Generated\Shared\Transfer\ItemTransfer[]
     */
    public function expandOrderItem(ItemTransfer $itemTransfer): ?ArrayObject
    {
        return $this->getFactory()
            ->createOrderItemExpander()
            ->expandOrderItem($itemTransfer);
    }
}
