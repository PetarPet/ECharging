<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class CustomerFilter implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        $session = session();
        if($_SESSION['logged']==true) {
            return redirect()->to(site_url('Customer/'));
        } else return redirect()->to(site_url('Home/'));
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
    }
}

