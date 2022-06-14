<?php

namespace FondOfOryx\Zed\GiftCardProportionalValuePayoneConnector\Business;

use ArrayObject;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfOryx\Zed\GiftCardProportionalValuePayoneConnector\Business\GiftCardProportionalValuePayoneConnectorBusinessFactory getFactory()
 */
class GiftCardProportionalValuePayoneConnectorFacade extends AbstractFacade implements GiftCardProportionalValuePayoneConnectorFacadeInterface
{
    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $orderEntity
     * @param \ArrayObject<\Generated\Shared\Transfer\ProportionalGiftCardValueTransfer> $proportionalGiftCardValues
     *
     * @return \ArrayObject<\Generated\Shared\Transfer\ProportionalGiftCardValueTransfer>
     */
    public function calculateProportionalGiftCardValues(SpySalesOrder $orderEntity, ArrayObject $proportionalGiftCardValues): ArrayObject
    {
        return $this->getFactory()->createProportionalGiftCardCalculator()->calculate($orderEntity, $proportionalGiftCardValues);
    }

    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $orderEntity
     *
     * @return bool
     */
    public function isPayonePaymentMethod(SpySalesOrder $orderEntity): bool
    {
        return $this->getFactory()->createIsPayonePaymentValidator()->validate($orderEntity);
    }
}
