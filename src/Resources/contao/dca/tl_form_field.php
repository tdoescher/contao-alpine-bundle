<?php

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xInit'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'w50' ],
    'sql' => [ 'type' => 'text', 'notnull' => false ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xShow'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'w50' ],
    'sql' => [ 'type' => 'text', 'notnull' => false ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xClass'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => ' clr 100' ],
    'sql' => [ 'type' => 'text', 'notnull' => false ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xModel'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [ 'maxlength' => 255, 'spaceToUnderscore' => true, 'tl_class' => 'w50' ],
    'sql' => [ 'type' => 'string', 'default' => '' ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xRef'] = [
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => [ 'tl_class' => 'w50 m12 cbx' ],
    'sql' => [ 'type' => 'boolean', 'default' => false ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xOnChange'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'clr w50' ],
    'sql' => [ 'type' => 'text', 'notnull' => false ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xOnInput'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'w50' ],
    'sql' => [ 'type' => 'text', 'notnull' => false ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xOnClick'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'clr w100' ],
    'sql' => [ 'type' => 'text', 'notnull' => false ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xOnFocus'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'clr w50' ],
    'sql' => [ 'type' => 'text', 'notnull' => false ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xOnBlur'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'w50' ],
    'sql' => [ 'type' => 'text', 'notnull' => false ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xBindClass'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'clr w100' ],
    'sql' => [ 'type' => 'text', 'notnull' => false ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xBindDisabled'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'clr w50' ],
    'sql' => [ 'type' => 'text', 'notnull' => false ]
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['xBindRequired'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [ 'rte' => 'ace|js', 'tl_class' => 'w50' ],
    'sql' => [ 'type' => 'text', 'notnull' => false ]
];
