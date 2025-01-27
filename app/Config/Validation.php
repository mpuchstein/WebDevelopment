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

    // Validation user login
    public array $loginInput= [
        'username' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Username required',
            ]
        ],
        'password' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Password required',
            ]
        ],
    ];

    public array $checkUsername=[
        'username' => [
            'rules' => 'required|is_not_unique[personen.username]',
            'errors' => [
                'required' => 'Username required',
                'is_not_unique' => 'Username does not exist',
            ]
        ]
    ];
    // Rules for validating arrays containing task data
    public array $tasksArray = [
        'task' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Bitte tragen Sie einen <strong>Tasknamen</strong> ein.'
            ],
        ],
        'taskartenid' => [
            'rules' => 'required|is_not_unique[taskarten.id]',
            'errors' => [
                'required' => 'Bitte wählen Sie eine <strong>Taskart</strong> aus.',
                'is_not_unique' => '<strong>Die gewählte Taskart existiert nicht.</strong>'
            ],
        ],
        'spaltenid' => [
            'rules' => 'required|is_not_unique[spalten.id]',
            'errors' => [
                'required' => 'Bitte wählen Sie eine <strong>Spalte</strong> aus.',
                'is_not_unique' => '<strong>Die gewählte Spalte existiert nicht.</strong>'
            ],
        ],
        'personenid' => [
            'rules' => 'required|is_not_unique[personen.id]',
            'errors' => [
                'required' => 'Bitte wählen Sie eine <strong>Person</strong> aus.',
                'is_not_unique' => '<strong>Die gewählte Person existiert nicht.</strong>'
            ],
        ],
        'deadline' => [
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Bitte tragen Sie eine <strong>Deadline</strong> ein.',
                'valid_date' => 'Bitte tragen Sie ein <strong>valides</strong> Datum ein.',
            ],
        ],
        'notizen' => [
            'rules' => 'max_length[255]',
            'errors' => [
                'max_length' => 'Bitte eine kürzere Notiz eintragen.',
            ]
        ],
        'erinnerung' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Bitte nicht am <strong>Sourcecode</strong> herumspielen.',
            ]
        ],
        'erledigt' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Bitte nicht am <strong>Sourcecode</strong> herumspielen.',
            ]
        ],
        'geloescht' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Bitte nicht am <strong>Sourcecode</strong> herumspielen.',
            ]
        ],
    ];

    public array $taskDelete = [
        'id' => [
            'rules' => 'required|is_not_unique[tasks.id]',
            'errors' => [
                'required' => 'ID ist erforderlich, um eine Spalte zu löschen.',
                'is_not_unique' => 'Diese ID existiert nicht. Kann also auch nicht gelöscht werden.',
            ]
        ]
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
