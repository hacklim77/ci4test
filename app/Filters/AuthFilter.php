<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        /* $auth = service('auth');

        if(!$auth->isLoggedIn()) {
            return redirect()->to(site_url('/login666'));
        } */
        if(!session('email')) {
            return redirect()->to(site_url('/login666'));
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}