<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\SalesQuantity\Communication\Plugin\SalesExtension;

use Generated\Shared\Transfer\ItemCollectionTransfer;
use Generated\Shared\Transfer\ItemTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\SalesExtension\Dependency\Plugin\ItemTransformerStrategyPluginInterface;

/**
 * @method \Spryker\Zed\SalesQuantity\Business\SalesQuantityFacadeInterface getFacade()
 */
class NonSplittableItemTransformerStrategyPlugin extends AbstractPlugin implements ItemTransformerStrategyPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     *
     * @return bool
     */
    public function isApplicable(ItemTransfer $itemTransfer): bool
    {
        return $itemTransfer->getIsQuantitySplittable() === false;
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     *
     * @return \Generated\Shared\Transfer\ItemCollectionTransfer
     */
    public function transformItem(ItemTransfer $itemTransfer): ItemCollectionTransfer
    {
        return $this->getFacade()->transformNonSplittableItem($itemTransfer);
    }
}
