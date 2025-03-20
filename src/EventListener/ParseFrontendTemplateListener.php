<?php

/**
 * This file is part of AlpineJS Bundle for Contao
 *
 * @package     tdoescher/alpinejs-bundle
 * @author      Torben Döscher <mail@tdoescher.de>
 * @license     LGPL
 * @copyright   tdoescher.de // WEB & IT <https://tdoescher.de>
 */

namespace tdoescher\AlpineJSBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\FrontendTemplate;
use Contao\StringUtil;

#[AsHook('parseFrontendTemplate')]
class ParseFrontendTemplateListener
{
    public function __invoke(string $buffer, string $templateName, FrontendTemplate $template): string
    {
        if($templateName !== 'form_wrapper' || !$template->alpinejsActive)
        {
            return $buffer;
        }

        $attr = $template->alpinejsAttr ? 'data-x' : 'x';

        $attributes = '';
        if ($template->xData) $attributes .= " $attr-data=\"$template->xData\"";
        if ($template->xInit) $attributes .= " $attr-init=\"$template->xInit\"";

        return preg_replace('/<div class="ce_form([^>]*)>/ui', '<div class="ce_form$1'.$attributes.'>', $buffer);
    }
}
