<?php



use Contao\CoreBundle\DataContainer\PaletteManipulator;

$GLOBALS['TL_DCA']['tl_form']['palettes']['__selector__'][] = 'alpinejsActive';
$GLOBALS['TL_DCA']['tl_form']['subpalettes']['alpinejsActive'] = 'alpinejsObj,alpinejsAttr,xData,xInit';

PaletteManipulator::create()
    ->addLegend('alpinejs_legend', 'config_legend')
    ->addField('alpinejsActive', 'alpinejs_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_form');

$GLOBALS['TL_DCA']['tl_form']['fields']['alpinejsActive'] = [
    'inputType' => 'checkbox',
    'eval' => [ 'submitOnChange' => true ],
    'sql' => [ 'type' => 'boolean', 'default' => false ]
];

$GLOBALS['TL_DCA']['tl_form']['fields']['alpinejsObj'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [ 'maxlength' => 255, 'tl_class' => 'clr w50' ],
    'sql' => [ 'type' => 'string', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form']['fields']['alpinejsAttr'] = [
    'inputType' => 'checkbox',
    'eval' => [ 'submitOnChange' => true, 'tl_class' => 'w50 m12' ],
    'sql' => [ 'type' => 'boolean', 'default' => false ]
];

$GLOBALS['TL_DCA']['tl_form']['fields']['xData'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'clr w50' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form']['fields']['xInit'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'w50' ],
    'sql' => [ 'type' => 'text', 'default' => '' ]
];
