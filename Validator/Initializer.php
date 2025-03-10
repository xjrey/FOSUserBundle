<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Validator;

use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Util\CanonicalFieldsUpdater;
use Symfony\Component\Validator\ObjectInitializerInterface;

/**
 * Automatically updates the canonical fields before validation.
 *
 * @author Christophe Coevoet <stof@notk.org>
 *
 * @internal
 *
 * @final
 */
class Initializer implements ObjectInitializerInterface
{
    private $canonicalFieldsUpdater;

    public function __construct(CanonicalFieldsUpdater $canonicalFieldsUpdater)
    {
        $this->canonicalFieldsUpdater = $canonicalFieldsUpdater;
    }

    /**
     * @param object $object
     */
    public function initialize($object)
    {
        if ($object instanceof UserInterface) {
            $this->canonicalFieldsUpdater->updateCanonicalFields($object);
        }
    }
}
