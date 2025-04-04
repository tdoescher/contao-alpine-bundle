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

        if (!in_array($widget->type, [ 'explanation', 'fieldsetStart', 'email', 'number', 'tel', 'url', 'text', 'textdigit', 'textcustom', 'password', 'passwordcustom', 'textarea', 'textareacustom', 'select', 'radio', 'checkbox', 'upload', 'range', 'hidden', 'hiddencustom', 'submit' ])) {
            return $widget;
        }

        $prefix = $form->alpinejsPrefix ? 'data-x-' : 'x-';
        $prefixOn = $form->alpinejsPrefix ? 'data-x-on:' : '@';
        $prefixBind = $form->alpinejsPrefix ? 'data-x-bind:' : ':';

        $widget->rowAttributes = '';

        // Widget x-init, x-show and :class
        if ($widget->xInit) $widget->rowAttributes .= ' ' . $prefix . 'init="' . $widget->xInit . '"';
        if (in_array($widget->type, [ 'explanation', 'fieldsetStart', 'email', 'number', 'tel', 'url', 'text', 'textdigit', 'textcustom', 'password', 'passwordcustom', 'textarea', 'textareacustom', 'select', 'radio', 'checkbox', 'upload', 'range', 'submit' ])) {
            if ($widget->xShow) $widget->rowAttributes .= ' ' . $prefix . 'show="' . $widget->xShow . '"';
            if ($widget->xClass) $widget->rowAttributes .= ' ' . $prefixBind . 'class="' . $widget->xClass . '"';
        }

        // Field x-model, x-ref, @change and :required
        if (in_array($widget->type, [ 'email', 'number', 'tel', 'url', 'text', 'textdigit', 'textcustom', 'password', 'passwordcustom', 'textarea', 'textareacustom', 'select', 'radio', 'checkbox', 'upload', 'range', 'hidden', 'hiddencustom' ])) {
            if ($form->xData && str_contains($form->xData, '&#35;&#35;model_object&#35;&#35;')) {
                $xModel = $widget->xModel ?: $widget->name;
                $widget->addAttribute($prefix . 'model', $xModel);

                $default = '';
                if ($widget->type === 'checkbox') {
                    $default = [];
                    foreach ($widget->options as $option) {
                        if (isset($option['default']) && $option['default'] === "1") $default[] = $option['value'];
                    }
                    $default = count($default) ? $xModel . ": ['" . implode("', '", $default) . "']" : $xModel . ": []";
                } elseif ($widget->type === 'radio') {
                    foreach ($widget->options as $option) {
                        if (isset($option['default']) && $option['default'] === "1") $default = $option['value'];
                    }
                    $default = $xModel . ": '" . $default . "'";
                } elseif (is_int($widget->value) || is_float($widget->value) || $widget->value === "true" || $widget->value === "false") {
                    $default = $xModel . ": " . $widget->value;
                } else {
                    $default = $xModel . ": '" . $widget->value . "'";
                }
                $GLOBALS['TL_ALPINEJS']['MODEL_OBJECT'][] = $default;
            } else {
                $widget->addAttribute($prefix . 'model', $widget->xModel);
            }

            if ($widget->xRef) $widget->addAttribute($prefix . 'ref', $widget->name);
            if ($widget->xOnChange) $widget->addAttribute($prefixOn . 'change', $widget->xOnChange);
            if ($widget->xBindRequired) $widget->addAttribute($prefixBind . 'required', $widget->xBindRequired);
        }

        // Button @click
        if ($widget->type === 'submit' ) {
            if ($widget->xOnClick) $widget->addAttribute($prefixOn . 'input', $widget->xOnClick);
        }

        // Field @input
        if (in_array($widget->type, [ 'email', 'number', 'tel', 'url', 'text', 'textdigit', 'textcustom', 'password', 'passwordcustom', 'textarea', 'textareacustom' ])) {
            if ($widget->xOnInput) $widget->addAttribute($prefixOn . 'input', $widget->xOnInput);
        }

        // Field/Button @focus, @blur, :class and :disabled
        if (in_array($widget->type, [ 'email', 'number', 'tel', 'url', 'text', 'textdigit', 'textcustom', 'password', 'passwordcustom', 'textarea', 'textareacustom', 'select', 'radio', 'checkbox', 'upload', 'range', 'submit' ])) {
            if ($widget->xOnFocus) $widget->addAttribute($prefixOn . 'focus', $widget->xOnFocus);
            if ($widget->xOnBlur) $widget->addAttribute($prefixOn . 'blur', $widget->xOnBlur);
            if ($widget->xBindClass) $widget->addAttribute($prefixBind . 'class', $widget->xBindClass);
            if ($widget->xBindDisabled) $widget->addAttribute($prefixBind . 'disabled', $widget->xBindDisabled);
        }

        return $widget;
    }
}
