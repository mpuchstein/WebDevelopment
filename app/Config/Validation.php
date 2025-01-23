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

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list' => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    // Rules for validating arrays containing task data
    public array $taskArray = [

    ];

    // Rules for validating arrays containing column data
    public array $columnArray = [
        'spalte' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Bitte tragen Sie eine <strong>Bezeichnung</strong> ein.',
            ],
        ],
        'spaltenbeschreibung' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Bitte tragen Sie eine <strong>Beschreibung</strong> ein.',
            ],
        ],
        'sortid' => [
            'rules' => 'required|integer',
            'errors' => [
                'required' => 'Bitte tragen Sie eine <strong>SortID</strong> ein.',
                'integer' => 'Bitte tragen Sie eine <strong>Zahl</strong> ein.',
            ]
        ],
        'boardsid' => [
            'rules' => 'required|is_not_unique[boards.id]',
            'errors' => [
                'required' => 'Bitte wählen Sie ein <strong>Board</strong> aus.',
                'is_not_unique' => '<strong>Das gewählte Board existiert nicht!!</strong>',
            ],
        ],
    ];
    //rules for validating a delete action on columns
    public array $columnDelete = [
        'id' => [
            'rules' => 'required|is_not_unique[spalten.id]',
            'errors' => [
                'required' => 'ID ist erforderlich, um eine Spalte zu löschen.',
                'is_not_unique' => 'Diese ID existiert nicht. Kann also auch nicht gelöscht werden.',
            ]
        ]
    ];
}
