<?php

/**
 * This file is part of AlpineJS Bundle for Contao
 *
 * @package     tdoescher/alpinejs-bundle
 * @author      Torben Döscher <mail@tdoescher.de>
 * @license     LGPL
 * @copyright   tdoescher.de // WEB & IT <https://tdoescher.de>
 */

namespace tdoescher\AlpineJSBundle\EventListener\DataContainer;

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;
use Contao\FormFieldModel;
use Contao\FormModel;
use Symfony\Component\HttpFoundation\RequestStack;

#[AsCallback(table: 'tl_form_field', target: 'config.onload')]
class AlpineJSFormFieldsCallback
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function __invoke(DataContainer|null $dc = null): void
    {
        if ($dc === null || !$dc->id || $this->requestStack->getCurrentRequest()->query->get('act') !== 'edit') {
            return;
        }

        $field = FormFieldModel::findById($dc->id);
        $form = FormModel::findById($field->pid);

        if (!$form->alpinejsActive) {
            return;
        }

        PaletteManipulator::create()
            ->addLegend('alpinejsWidget_legend', 'text_legend')
            ->addField('xInit', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xShow', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xClass', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->applyToPalette('explanation', 'tl_form_field');

        PaletteManipulator::create()
            ->addLegend('alpinejsWidget_legend', 'fconfig_legend')
            ->addField('xInit', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xShow', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xClass', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->applyToPalette('fieldsetStart', 'tl_form_field');

        PaletteManipulator::create()
            ->addLegend('alpinejsWidget_legend', 'fconfig_legend')
            ->addField('xInit', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xShow', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xClass', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->addLegend('alpinejsField_legend', 'alpinejsWidget_legend')
            ->addField('xModel', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xOnChange', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xOnInput', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xOnFocus', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xOnBlur', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xBindClass', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xBindDisabled', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xBindRequired', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->applyToPalette('text', 'tl_form_field')
            ->applyToPalette('textdigit', 'tl_form_field')
            ->applyToPalette('textcustom', 'tl_form_field')
            ->applyToPalette('password', 'tl_form_field')
            ->applyToPalette('passwordcustom', 'tl_form_field')
            ->applyToPalette('textarea', 'tl_form_field')
            ->applyToPalette('textareacustom', 'tl_form_field');

        PaletteManipulator::create()
            ->addLegend('alpinejsWidget_legend', 'fconfig_legend')
            ->addField('xInit', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xShow', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xClass', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->addLegend('alpinejsField_legend', 'alpinejsWidget_legend')
            ->addField('xModel', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xOnChange', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xOnFocus', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xOnBlur', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xBindClass', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xBindDisabled', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xBindRequired', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->applyToPalette('select', 'tl_form_field')
            ->applyToPalette('radio', 'tl_form_field')
            ->applyToPalette('checkbox', 'tl_form_field')
            ->applyToPalette('upload', 'tl_form_field')
            ->applyToPalette('range', 'tl_form_field');

        PaletteManipulator::create()
            ->addLegend('alpinejsWidget_legend', 'fconfig_legend')
            ->addField('xInit', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->addLegend('alpinejsField_legend', 'alpinejsWidget_legend')
            ->addField('xModel', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xOnChange', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xBindRequired', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->applyToPalette('hidden', 'tl_form_field')
            ->applyToPalette('hiddencustom', 'tl_form_field');

        PaletteManipulator::create()
            ->addLegend('alpinejsWidget_legend', 'fconfig_legend')
            ->addField('xInit', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xShow', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xClass', 'alpinejsWidget_legend', PaletteManipulator::POSITION_APPEND)
            ->addLegend('alpinejsField_legend', 'alpinejsWidget_legend')
            ->addField('xOnClick', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xOnFocus', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xOnBlur', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xBindClass', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('xBindDisabled', 'alpinejsField_legend', PaletteManipulator::POSITION_APPEND)
            ->applyToPalette('submit', 'tl_form_field');
    }
}
