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
use Contao\StringUtil;
use Contao\Widget;

#[AsHook('loadFormField')]
class LoadFormFieldListener
{
    public function __invoke(Widget $widget, string $formId, array $formData, Form $form): Widget
    {
        if (!$form->alpinejsActive) {
            return $widget;
        }

        $attr = $form->alpinejsAttr ? 'data-x' : 'x';
        $obj = $form->alpinejsObj ? $form->alpinejsObj . '.' : '';

        // Widget
        $widget->rowAttributes = '';
        if ($widget->xInit) $widget->rowAttributes .= " $attr-init=\"$widget->xInit\"";
        if ($widget->xShow) $widget->rowAttributes .= " $attr-show=\"$widget->xShow\"";

        // Field
        if (in_array($widget->type, [ 'text', 'textdigit', 'textcustom', 'password', 'passwordcustom', 'textarea', 'textareacustom', 'select', 'radio', 'checkbox', 'upload', 'range', 'hidden', 'hiddencustom', 'submit' ])) {
            if ($widget->type !== 'submit') {
                $widget->addAttribute($attr . '-model', $obj . $widget->name);
            }

            if ($widget->xOnInput) $widget->addAttribute($attr . '-on:input', $widget->xOnInput);
            if ($widget->xOnChange) $widget->addAttribute($attr . '-on:change', $widget->xOnChange);
            if ($widget->xOnFocus) $widget->addAttribute($attr . '-on:focus', $widget->xOnFocus);
            if ($widget->xOnBlur) $widget->addAttribute($attr . '-on:blur', $widget->xOnBlur);
            if ($widget->xBindRequired) $widget->addAttribute($attr . '-bind:required', $widget->xBindRequired);
            if ($widget->xBindDisabled) $widget->addAttribute($attr . '-bind:disabled', $widget->xBindDisabled);
        }

        // Options
        if ($widget->type === 'checkbox') {
            $options = [];
            foreach ($widget->options as $index => $option) {
                $options[$index] = $option;
                $options[$index][$attr . '-model'] = $obj . $widget->name;
                if ($widget->xOnInput) $options[$index][$attr . '-on:input'] = $widget->xOnInput;
                if ($widget->xOnChange) $options[$index][$attr . '-on:change'] = $widget->xOnChange;
                if ($widget->xOnFocus) $options[$index][$attr . '-on:focus'] = $widget->xOnFocus;
                if ($widget->xOnBlur) $options[$index][$attr . '-on:blur'] = $widget->xOnBlur;
                if ($widget->xBindRequired) $options[$index][$attr . '-bind:required'] = $widget->xBindRequired;
                if ($widget->xBindDisabled) $options[$index][$attr . '-bind:disabled'] = $widget->xBindDisabled;
            }
            $widget->options = $options;
        }

        return $widget;
    }
}
