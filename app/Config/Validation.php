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
    public array $loginInput = [
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

    public array $checkUsername = [
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
                'required' => 'Bitte tragen Sie einen Tasknamen ein.'
            ],
        ],
        'taskartenid' => [
            'rules' => 'required|is_not_unique[taskarten.id]',
            'errors' => [
                'required' => 'Bitte wählen Sie eine Taskart aus.',
                'is_not_unique' => 'Die gewählte Taskart existiert nicht.'
            ],
        ],
        'spaltenid' => [
            'rules' => 'required|is_not_unique[spalten.id]',
            'errors' => [
                'required' => 'Bitte wählen Sie eine Spalte aus.',
                'is_not_unique' => 'Die gewählte Spalte existiert nicht.'
            ],
        ],
        'personenid' => [
            'rules' => 'required|is_not_unique[personen.id]',
            'errors' => [
                'required' => 'Bitte wählen Sie eine Person aus.',
                'is_not_unique' => 'Die gewählte Person existiert nicht.'
            ],
        ],
        'deadline' => [
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Bitte tragen Sie eine Deadline ein.',
                'valid_date' => 'Bitte tragen Sie ein valides Datum ein.',
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
                'required' => 'Bitte nicht am Sourcecode herumspielen.',
            ]
        ],
        'erledigt' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Bitte nicht am Sourcecode herumspielen.',
            ]
        ],
        'geloescht' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Bitte nicht am Sourcecode herumspielen.',
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
                'required' => 'Bitte tragen Sie eine Bezeichnung ein.',
            ],
        ],
        'spaltenbeschreibung' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Bitte tragen Sie eine Beschreibung ein.',
            ],
        ],
        'sortid' => [
            'rules' => 'required|integer',
            'errors' => [
                'required' => 'Bitte tragen Sie eine SortID ein.',
                'integer' => 'Bitte tragen Sie eine Zahl ein.',
            ]
        ],
        'boardsid' => [
            'rules' => 'required|is_not_unique[boards.id]',
            'errors' => [
                'required' => 'Bitte wählen Sie ein Board aus.',
                'is_not_unique' => 'Das gewählte Board existiert nicht!!',
            ],
        ],
    ];
    //rules for validating a delete action on columns
    public array $columnDelete = [
        'id' => [
            'rules' => 'required|is_not_unique[spalten.id]|is_unique[tasks.spaltenid]',
            'errors' => [
                'required' => 'ID ist erforderlich, um eine Spalte zu löschen.',
                'is_not_unique' => 'Diese ID existiert nicht. Kann also auch nicht gelöscht werden.',
                'is_unique' => 'Es gibt noch Tasks in dieser Spalte!',
            ]
        ]
    ];
    public array $usersInsertArray = [
        'username' => [
            'rules' => 'required|is_unique[personen.username]',
            'errors' => [
                'required' => 'Username ist erforderlich.',
                'is_unique' => 'Dieser Username existiert bereits.',
            ]
        ],
        'plevel' => [
            'rules' => 'permit_empty|is_natural_no_zero',
            'errors' => [
                'is_natural_no_zero' => 'Privilegien müssen eine natürliche Zahl sein.',
            ]
        ],
        'vorname' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Vorname ist erforderlich.',
            ]
        ],
        'name' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Name ist erforderlich.',
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email|is_unique[personen.email]',
            'errors' => [
                'required' => 'Email ist erforderlich.',
                'is_unique' => 'Diese Email existiert bereits bei einem anderen Nutzer.',
            ]
        ],
    ];
    //rules for validation an insert action on users
    public array $usersUpdateArray = [
        'id' => [
            'rules' => 'required|is_not_unique[personen.id]',
            'errors' => [
                'required' => 'This error means somebody messed with the code.',
                'is_not_unique' => 'Person kann nicht bearbeitet werden, wenn Ihre ID nicht existiert.',
            ]
        ],
        'username' => [
            'rules' => 'required|is_unique[personen.username,id,{id}]',
            'errors' => [
                'required' => 'Nutzername ist erforderlich.',
                'is_unique' => 'Dieser Nutzername existiert bereits.',
            ]
        ],
        'plevel' => [
            'rules' => 'is_natural_no_zero',
            'errors' => [
                'is_natural_no_zero' => 'Privilegien müssen eine natürliche Zahl sein.',
            ]
        ],
        'vorname' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Vorname ist erforderlich.',
            ]
        ],
        'name' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Name ist erforderlich.',
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email|is_unique[personen.email,id,{id}]',
            'errors' => [
                'required' => 'Email ist erforderlich.',
                'is_unique' => 'Diese Email existiert bereits bei einem anderen Nutzer.',
            ]
        ],
    ];
    public array $usersDeleteArray = [
        'id' => [
            'rules' => 'required|is_not_unique[personen.id]|is_unique[tasks.personenid]',
            'errors' => [
                'required' => 'ID ist erforderlich, um eine Person zu löschen.',
                'is_not_unique' => 'Diese Person existiert nicht.',
                'is_unique' => 'Es gibt noch Tasks zu dieser Person.',
            ]
        ]
    ];

    public array $boardsId = [
        'id' => [
            'rules' => 'required|is_not_unique[boards.id]',
            'errors' => [
                'required' => 'Board ID ist erforderlich.',
                'is_not_unique' => 'Dieses Board existiert nicht.',
            ]
        ]
    ];

     public array $boardsDelete = [
        'id' => [
            'rules' => 'required|is_not_unique[boards.id]|is_unique[spalten.boardsid]',
            'errors' => [
                'required' => 'Board ID ist erforderlich.',
                'is_not_unique' => 'Dieses Board existiert nicht.',
                'is_unique' => 'Dieses Board hat noch Spalten.',
            ]
        ]
    ];

    public array $boardsInsertArray = [
        'board' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Boardname ist erforderlich.',
            ]
        ]
    ];
    public array $boardsUpdateArray = [
        'id' => [
            'rules' => 'required|is_not_unique[boards.id]',
            'errors' => [
                'required' => 'ID ist erforderlich.',
                'is_not_unique' => 'Diese ID existiert nicht.',
            ]
        ],
        'board' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Board ist erforderlich.',
            ]
        ]
    ];
}
