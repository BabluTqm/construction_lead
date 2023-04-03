<?php
declare(strict_types=1);


namespace App\Controller\Admin;
use Cake\Controller\Controller;
use Cake\Routing\Router;
// use Cake\Controller\Controller;
class AppController extends Controller
{
    //Admin prefix set
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication',[
            'unauthenticatedRedirect' => Router::url([
                'prefix' => 'Admin',
                'plugin' => null,
                'controller' => 'Users',
                'action' => 'login',
            ]),
            'loginUrl' => Router::url([
                'prefix' => 'Admin',
                'plugin' => null,
                'controller' => 'Users',
                'action' => 'login',
            ]),
            
        ]);
}
}
