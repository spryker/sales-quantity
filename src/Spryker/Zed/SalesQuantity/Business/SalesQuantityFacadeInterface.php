<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\SalesQuantity\Business;

use Generated\Shared\Transfer\CartChangeTransfer;
use Generated\Shared\Transfer\DiscountableItemTransformerTransfer;
use Generated\Shared\Transfer\ItemCollectionTransfer;
use Generated\Shared\Transfer\ItemTransfer;

/**
 * @method \Spryker\Zed\SalesQuantity\Business\SalesQuantityBusinessFactory getFactory()
 */
interface SalesQuantityFacadeInterface
{
    /**
     * Specification:
     * - Adds unchanged item to the returned item collection according to the non-splittable strategy.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     *
     * @return \Generated\Shared\Transfer\ItemCollectionTransfer
     */
    public function transformNonSplittableItem(ItemTransfer $itemTransfer): ItemCollectionTransfer;

    /**
     * Specification:
     * - Executes `NonSplittableItemFilterPluginInterface` plugin stack to filter out non-splittable items.
     * - Reads a persisted concrete product from database.
     * - Expands the items of the CartChangeTransfer with a specific concrete product's data.
     * - Returns the expanded CartChangeTransfer.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CartChangeTransfer $cartChangeTransfer
     *
     * @return \Generated\Shared\Transfer\CartChangeTransfer
     */
    public function expandCartChangeWithIsQuantitySplittable(CartChangeTransfer $cartChangeTransfer): CartChangeTransfer;

    /**
     * Specification:
     * - Transforms discountable item according to the non splittable strategy.
     * - Calculates iteration price based on sum of unit prices of already applied discounts with lower priority,
     *   if discount priority is provided in `DiscountableItemTransformerTransfer.discount.priority` and `DiscountableItemTransformerTransfer.discountableItem.originalItemCalculatedDiscounts.priority`.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\DiscountableItemTransformerTransfer $discountableItemTransformerTransfer
     *
     * @return \Generated\Shared\Transfer\DiscountableItemTransformerTransfer
     */
    public function transformNonSplittableDiscountableItem(
        DiscountableItemTransformerTransfer $discountableItemTransformerTransfer
    ): DiscountableItemTransformerTransfer;

    /**
     * Specification:
     * - Checks if the item is splittable per quantity.
     * - Returns false if the item is a bundled product and its quantity exceeds the preconfigured quantity threshold for bundled products.
     * - Returns false if the product is non-splittable.
     * - Returns false if the item exceeded the preconfigured quantity threshold.
     * - Returns true in any other case.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     *
     * @return bool
     */
    public function isItemQuantitySplittable(ItemTransfer $itemTransfer);
}
