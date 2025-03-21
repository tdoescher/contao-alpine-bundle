<?php



use Contao\CoreBundle\DataContainer\PaletteManipulator;

$GLOBALS['TL_DCA']['tl_form']['palettes']['__selector__'][] = 'alpinejsActive';
$GLOBALS['TL_DCA']['tl_form']['subpalettes']['alpinejsActive'] = 'xData,xInit,xSubmit,xClass,alpinejsPrefix';

PaletteManipulator::create()
    ->addLegend('alpinejs_legend', 'config_legend')
    ->addField('alpinejsActive', 'alpinejs_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_form');

$GLOBALS['TL_DCA']['tl_form']['fields']['alpinejsActive'] = [
    'inputType' => 'checkbox',
    'eval' => [ 'submitOnChange' => true ],
    'sql' => [ 'type' => 'boolean', 'default' => false ]
];

$GLOBALS['TL_DCA']['tl_form']['fields']['xData'] = [
    'exclude' => true,
    'inputType' => 'textarea',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'clr w100' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form']['fields']['xInit'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'clr w100' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form']['fields']['xSubmit'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'clr w100' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form']['fields']['xClass'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'clr w100' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form']['fields']['alpinejsPrefix'] = [
    'inputType' => 'checkbox',
    'eval' => [ 'tl_class' => 'clr w50' ],
    'sql' => [ 'type' => 'boolean', 'default' => false ]
];
