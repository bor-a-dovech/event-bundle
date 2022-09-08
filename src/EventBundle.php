<?php

namespace Pantheon\EventBundle;

use Pantheon\EventBundle\DependencyInjection\EventBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class EventBundle extends Bundle
{
    public function getContainerExtension() : EventBundleExtension
    {
        if ($this->extension === null) {
            $this->extension = new EventBundleExtension();
        }
        return $this->extension;
    }
}
