<?php

/*
 * This file is part of Mannequin.
 *
 * (c) 2017 Last Call Media, Rob Bayliss <rob@lastcallmedia.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace LastCall\Mannequin\Core\Extension;

use LastCall\Mannequin\Core\ConfigInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface ExtensionInterface
{
    /**
     * Set the configuration instance.
     *
     * This method will be called when extensions are first called for.
     * The container will be available before calling any of the get* mehtods,
     * but not in the constructor.
     *
     * @param \LastCall\Mannequin\Core\ConfigInterface $container
     */
    public function setConfig(ConfigInterface $container);

    /**
     * Get the pattern discoverers provided by this extension.
     *
     * @return \LastCall\Mannequin\Core\Discovery\DiscoveryInterface[]
     */
    public function getDiscoverers(): array;

    /**
     * Get the pattern renderers provided by this extension.
     *
     * @return \LastCall\Mannequin\Core\Engine\EngineInterface[]
     */
    public function getRenderers(): array;

    /**
     * Get the variable resolvers provided by this extension.
     *
     * @return \LastCall\Mannequin\Core\Variable\ResolverInterface[]
     */
    public function getVariableResolvers(): array;

    /**
     * Attach an extension's listeners/subscribers to a dispatcher.
     *
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $dispatcher
     */
    public function attachToDispatcher(EventDispatcherInterface $dispatcher);
}