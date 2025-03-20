<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

PaletteManipulator::create()
    ->addLegend('alpinejs_legend', 'text_legend')
    ->addField('xInit', 'alpinejs_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('xShow', 'alpinejs_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('explanation', 'tl_form_field');

PaletteManipulator::create()
    ->addLegend('alpinejs_legend', 'fconfig_legend')
    ->addField('xInit', 'alpinejs_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('xShow', 'alpinejs_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('fieldsetStart', 'tl_form_field');

PaletteManipulator::create()
    ->addLegend('alpinejs_legend', 'fconfig_legend')
    ->addField('xInit', 'alpinejs_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('xShow', 'alpinejs_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('xModel', 'alpinejs_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('xOnInput', 'alpinejs_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('xOnChange', 'alpinejs_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('xOnFocus', 'alpinejs_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('xOnBlur', 'alpinejs_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('xBindDisabled', 'alpinejs_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('xBindRequired', 'alpinejs_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('text', 'tl_form_field')
    ->applyToPalette('textdigit', 'tl_form_field')
    ->applyToPalette('textcustom', 'tl_form_field')
    ->applyToPalette('password', 'tl_form_field')
    ->applyToPalette('passwordcustom', 'tl_form_field')
    ->applyToPalette('textarea', 'tl_form_field')
    ->applyToPalette('textareacustom', 'tl_form_field')
    ->applyToPalette('select', 'tl_form_field')
    ->applyToPalette('radio', 'tl_form_field')
    ->applyToPalette('checkbox', 'tl_form_field')
    ->applyToPalette('upload', 'tl_form_field')
    ->applyToPalette('range', 'tl_form_field')
    ->applyToPalette('hidden', 'tl_form_field')
    ->applyToPalette('hiddencustom', 'tl_form_field')
    ->applyToPalette('submit', 'tl_form_field');

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xInit'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'clr w50' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xShow'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'w50' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xModel'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [ 'maxlength' => 255, 'tl_class' => 'clr' ],
    'sql' => [ 'type' => 'string', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xOnInput'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'clr w50' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xOnChange'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'w50' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xOnFocus'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'clr w50' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xOnBlur'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'w50' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xOnClick'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'clr w50' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xOnSubmit'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'w50' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xBindDisabled'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'clr w50' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xBindRequired'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'w50' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];
