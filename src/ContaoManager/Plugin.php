<?php

/**
 * This file is part of AlpineJS Bundle for Contao
 *
 * @package     tdoescher/alpinejs-bundle
 * @author      Torben Döscher <mail@tdoescher.de>
 * @license     LGPL
 * @copyright   tdoescher.de // WEB & IT <https://tdoescher.de>
 */

namespace tdoescher\AlpineJSBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use tdoescher\AlpineJSBundle\AlpineJSBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [ BundleConfig::create(AlpineJSBundle::class)
            ->setLoadAfter([ ContaoCoreBundle::class ]) ];
    }
}
