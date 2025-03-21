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
use Contao\Form;
use Contao\Widget;

#[AsHook('loadFormField')]
class LoadFormFieldListener
{
    public function __invoke(Widget $widget, string $formId, array $formData, Form $form): Widget
    {
        if (!$form->alpinejsActive) {
            return $widget;
        }

        $prefix = $form->alpinejsPrefix ? 'data-x-' : 'x-';
        $prefixBind = $form->alpinejsPrefix ? 'data-x-bind:' : ':';
        $prefixOn = $form->alpinejsPrefix ? 'data-x-on:' : '@';

        $widget->rowAttributes = '';

        if (in_array($widget->type, [ 'text', 'textdigit', 'textcustom', 'password', 'passwordcustom', 'textarea', 'textareacustom' ])) {
            if ($widget->xInit) $widget->rowAttributes .= ' ' . $prefix . 'init="' . $widget->xInit . '"';
            if ($widget->xShow) $widget->rowAttributes .= ' ' . $prefix . 'show="' . $widget->xShow . '"';
            if ($widget->xClass) $widget->rowAttributes .= ' ' . $prefixBind . 'class="' . $widget->xClass . '"';

            $widget->addAttribute($prefix . 'model', $widget->xModel ?: $widget->name);
            if ($widget->xOnInput) $widget->addAttribute($prefixOn . 'input', $widget->xOnInput);
            if ($widget->xOnChange) $widget->addAttribute($prefixOn . 'change', $widget->xOnChange);
            if ($widget->xOnFocus) $widget->addAttribute($prefixOn . 'focus', $widget->xOnFocus);
            if ($widget->xOnBlur) $widget->addAttribute($prefixOn . 'blur', $widget->xOnBlur);
            if ($widget->xBindClass) $widget->addAttribute($prefixBind . 'class', $widget->xBindClass);
            if ($widget->xBindDisabled) $widget->addAttribute($prefixBind . 'disabled', $widget->xBindDisabled);
            if ($widget->xBindRequired) $widget->addAttribute($prefixBind . 'required', $widget->xBindRequired);
        }

        if (in_array($widget->type, [ 'select', 'radio', 'checkbox', 'upload', 'range' ])) {
            if ($widget->xInit) $widget->rowAttributes .= ' ' . $prefix . 'init="' . $widget->xInit . '"';
            if ($widget->xShow) $widget->rowAttributes .= ' ' . $prefix . 'show="' . $widget->xShow . '"';
            if ($widget->xClass) $widget->rowAttributes .= ' ' . $prefixBind . 'class="' . $widget->xClass . '"';

            $widget->addAttribute($prefix . 'model', $widget->xModel ?: $widget->name);
            if ($widget->xOnChange) $widget->addAttribute($prefixOn . 'change', $widget->xOnChange);
            if ($widget->xOnFocus) $widget->addAttribute($prefixOn . 'focus', $widget->xOnFocus);
            if ($widget->xOnBlur) $widget->addAttribute($prefixOn . 'blur', $widget->xOnBlur);
            if ($widget->xBindClass) $widget->addAttribute($prefixBind . 'class', $widget->xBindClass);
            if ($widget->xBindDisabled) $widget->addAttribute($prefixBind . 'disabled', $widget->xBindDisabled);
            if ($widget->xBindRequired) $widget->addAttribute($prefixBind . 'required', $widget->xBindRequired);
        }

        if (in_array($widget->type, [ 'hidden', 'hiddencustom' ])) {
            if ($widget->xInit) $widget->rowAttributes .= ' ' . $prefix . 'init="' . $widget->xInit . '"';

            $widget->addAttribute($prefix . 'model', $widget->xModel ?: $widget->name);
            if ($widget->xOnInput) $widget->addAttribute($prefixOn . 'input', $widget->xOnInput);
            if ($widget->xOnChange) $widget->addAttribute($prefixOn . 'change', $widget->xOnChange);
            if ($widget->xBindRequired) $widget->addAttribute($prefixBind . 'required', $widget->xBindRequired);
        }

        if (in_array($widget->type, [  'submit' ])) {
            if ($widget->xInit) $widget->rowAttributes .= ' ' . $prefix . 'init="' . $widget->xInit . '"';
            if ($widget->xShow) $widget->rowAttributes .= ' ' . $prefix . 'show="' . $widget->xShow . '"';
            if ($widget->xClass) $widget->rowAttributes .= ' ' . $prefixBind . 'class="' . $widget->xClass . '"';

            if ($widget->xOnClick) $widget->addAttribute($prefixOn . 'input', $widget->xOnClick);
            if ($widget->xOnFocus) $widget->addAttribute($prefixOn . 'focus', $widget->xOnFocus);
            if ($widget->xOnBlur) $widget->addAttribute($prefixOn . 'blur', $widget->xOnBlur);
            if ($widget->xBindClass) $widget->addAttribute($prefixBind . 'class', $widget->xBindClass);
            if ($widget->xBindDisabled) $widget->addAttribute($prefixBind . 'disabled', $widget->xBindDisabled);
            if ($widget->xBindRequired) $widget->addAttribute($prefixBind . 'required', $widget->xBindRequired);
        }

        return $widget;
    }
}
