<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourcePresenter;

class Artikel extends ResourcePresenter
{
    /**
     * Present a view of resource objects.
     *
     * @return ResponseInterface
     */
    function __construct() {
        // service('uri');
    }

    public function index()
    {
        //
        // $request = service('request');
        // $uri = $request->uri;
        // $something = $uri->getSegment(1); 

        $data = [
            'title' => 'Artikel',
            'subtitle' => 'Daftar Artikel',
            'menu' => 'artikel',
        ];
        return view('admin/artikel/index',$data);
    }

    /**
     * Present a view to present a specific resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
    }

    /**
     * Present a view to edit the properties of a specific resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Present a view to confirm the deletion of a specific resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
