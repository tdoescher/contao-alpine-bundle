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

        if (!in_array($widget->type, [ 'explanation', 'fieldsetStart', 'text', 'textdigit', 'textcustom', 'password', 'passwordcustom', 'textarea', 'textareacustom', 'select', 'radio', 'checkbox', 'upload', 'range', 'hidden', 'hiddencustom', 'submit' ])) {
            return $widget;
        }

        $prefix = $form->alpinejsPrefix ? 'data-x-' : 'x-';
        $prefixBind = $form->alpinejsPrefix ? 'data-x-bind:' : ':';
        $prefixOn = $form->alpinejsPrefix ? 'data-x-on:' : '@';

        $widget->rowAttributes = '';

        // Widget x-init, x-show and :class
        if ($widget->xInit) $widget->rowAttributes .= ' ' . $prefix . 'init="' . $widget->xInit . '"';
        if (!in_array($widget->type, [ 'hidden', 'hiddencustom' ])) {
            if ($widget->xShow) $widget->rowAttributes .= ' ' . $prefix . 'show="' . $widget->xShow . '"';
            if ($widget->xClass) $widget->rowAttributes .= ' ' . $prefixBind . 'class="' . $widget->xClass . '"';
        }

        // Field x-model
        if (!in_array($widget->type, [ 'submit' ])) {
            $widget->addAttribute($prefix . 'model', $widget->xModel ?: $widget->name);
        }
        if (in_array($widget->type, [ 'text', 'textdigit', 'textcustom', 'password', 'passwordcustom', 'textarea', 'textareacustom', 'select', 'radio', 'checkbox', 'upload', 'range', 'hidden', 'hiddencustom' ])) {
            if (is_int($widget->value) || is_float($widget->value) || $widget->value === "true" || $widget->value === "false") {
                $GLOBALS['TL_ALPINEJS']['MODEL_OBJECT'][] = $widget->xModel ?: $widget->name . ": " . $widget->value;
            } else {
                $GLOBALS['TL_ALPINEJS']['MODEL_OBJECT'][] = $widget->xModel ?: $widget->name . ": '" . $widget->value . "'";
            }
        }

        // Field @input
        if (in_array($widget->type, [ 'text', 'textdigit', 'textcustom', 'password', 'passwordcustom', 'textarea', 'textareacustom', 'hidden', 'hiddencustom' ])) {
            if ($widget->xOnInput) $widget->addAttribute($prefixOn . 'input', $widget->xOnInput);
        }

        // Field @change
        if (!in_array($widget->type, [ 'submit' ])) {
            if ($widget->xOnChange) $widget->addAttribute($prefixOn . 'change', $widget->xOnChange);
        }

        // Field/Button @focus and @blur
        if (!in_array($widget->type, [ 'hidden', 'hiddencustom' ])) {
            if ($widget->xOnFocus) $widget->addAttribute($prefixOn . 'focus', $widget->xOnFocus);
            if ($widget->xOnBlur) $widget->addAttribute($prefixOn . 'blur', $widget->xOnBlur);
        }

        // Button @click
        if (in_array($widget->type, [ 'submit' ])) {
            if ($widget->xOnClick) $widget->addAttribute($prefixOn . 'input', $widget->xOnClick);
        }

        // Field/Button :class
        if (!in_array($widget->type, [ 'hidden', 'hiddencustom' ])) {
            if ($widget->xBindClass) $widget->addAttribute($prefixBind . 'class', $widget->xBindClass);
        }

        // Field/Button :disabled
        if (!in_array($widget->type, [ 'hidden', 'hiddencustom' ])) {
            if ($widget->xBindDisabled) $widget->addAttribute($prefixBind . 'disabled', $widget->xBindDisabled);
        }

        // Field/Button :required
        if (!in_array($widget->type, [ 'submit' ])) {
            if ($widget->xBindRequired) $widget->addAttribute($prefixBind . 'required', $widget->xBindRequired);
        }

        return $widget;
    }
}
