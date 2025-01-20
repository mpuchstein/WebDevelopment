<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    // Validierungsregeln
    public $spaltenbearbeiten = [
        'spalte' => 'required',
        'spaltenbeschreibung' => 'required',
        'sortid' => 'integer',
    ];

    // Fehlermeldungen
    public $spaltenbearbeiten_errors = [
        'spalte' => [
            'required' => 'Bitte tragen Sie einen Spaltebezeichnung ein.'
        ],
        'spaltenbeschreibung' => [
            'required' => 'Bitte tragen Sie einen Beschreibungein.'
        ],
        'sortid' => [
            'integer' => 'Die Sortid muss eine Zahl sein.',
        ],
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
