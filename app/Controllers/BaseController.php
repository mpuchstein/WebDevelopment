<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->session = Services::session();
        $this->validation = Services::validation();
        // E.g.: $this->session = \Config\Services::session();
    }

    public function getNavElements($active = null):array{
        $navElems = [];
        $menuElems = [];
        if(session('logged_in')){
            $navElems['tasks'] = ['name' => 'Tasks', 'link' => base_url('tasks')];
            $navElems['boards'] = ['name' => 'Boards', 'link' => base_url('boards')];
            $navElems['columns'] = ['name' => 'Spalten', 'link' => base_url('columns')];
            $menuElems['profile'] = ['name' => 'Profile', 'link' => base_url('users/profile')];
            $menuElems['logout'] = ['name' => 'Logout', 'link' => base_url('logout')];
            if(session('pLevel') >= 2000){
                $navElems['users'] = ['name' => 'Personen', 'link' => base_url('users')];
            }
        } else {
            $navElems['register'] = ['name' => 'Register', 'link' => base_url('register')];
        }
        if($active != null && isset($navElems[$active])){
            $navElems[$active]['active'] = true;
        }
        return ['navElems' => $navElems, 'menuElems' => $menuElems];
    }
}
