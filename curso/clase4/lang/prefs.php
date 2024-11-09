<?php

const es =
[
    'flag' => '🇪🇸',
    'h1' => 'Preferencias',
    'msg'=> 'Sus preferencias han sido seleccionadas'
];
const en =
[
    'flag' => '🇬🇧',
    'h1' => 'Preferences',
    'msg'=> 'Your preferences have been selected'
];

const fr =
[
    'flag' => '🇫🇷',
    'h1' => 'Préférences',
    'msg'=> 'Vos préférences ont été sélectionnées'
];
const de =
[
    'flag' => '🇩🇪',
    'h1' => 'Präferenzen',
    'msg'=> 'Ihre Präferenzen wurden ausgewählt'
];
const pt =
[
    'flag' => '🇵🇹',
    'h1' => 'Preferências',
    'msg'=> 'As suas preferências foram selecionadas'
];

function mostrarPreferencias() : array
{
    $idioma = $_SESSION['idioma'];
    switch ( $idioma ){
        case 'es':
            $lang = es;
            break;
        case 'en':
            $lang = en;
            break;
        case 'fr':
            $lang = fr;
            break;
        case 'de':
            $lang = de;
            break;
        case 'pt':
            $lang = pt;
            break;
    }
    return $lang;
}