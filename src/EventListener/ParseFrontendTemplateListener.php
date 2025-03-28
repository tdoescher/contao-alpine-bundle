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

#[AsHook('parseFrontendTemplate')]
class ParseFrontendTemplateListener
{
    public function __invoke(string $buffer, string $templateName, FrontendTemplate $template): string
    {
        if (!str_starts_with($templateName, 'form_wrapper') && !str_starts_with($templateName, 'ajaxform')) {
            return $buffer;
        }

        if (!$template->alpinejsActive) {
            return $buffer;
        }

        $prefix = $template->alpinejsPrefix ? 'data-x-' : 'x-';
        $prefixOn = $template->alpinejsPrefix ? 'data-x-on:' : '@';
        $prefixBind = $template->alpinejsPrefix ? 'data-x-bind:' : ':';

        if ($template->xData && str_contains($template->xData, '&#35;&#35;model_object&#35;&#35;')) {
            $template->xData = str_replace('&#35;&#35;model_object&#35;&#35;','{' . implode(', ', $GLOBALS['TL_ALPINEJS']['MODEL_OBJECT']) . ' }', $template->xData);
        }

        $attributes = '';
        if ($template->xData) $attributes .= ' ' . $prefix . 'data="' . $template->xData . '"';
        if ($template->xInit) $attributes .= ' ' . $prefix . 'init="' . $template->xInit . '"';
        if ($template->xSubmit) $attributes .= ' ' . $prefixOn . 'submit="' . $template->xSubmit . '"';
        if ($template->xClass) $attributes .= ' ' . $prefixBind . 'class="' . $template->xClass . '"';

        return preg_replace('/<div class="(.*)" ([^>]*)>/ui', '<div$1' . $attributes . ' $2>', $buffer, 1);
    }
}
