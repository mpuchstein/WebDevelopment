<?php

namespace App\Filters;

use App\Models\Database;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class BoardIdFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $bid = session('boardsid');
        session() -> set('boardsid', $this->checkBoardId($bid));
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }

    private function checkBoardId($boardsId) {
        $validation = service('validation');
        if ($validation->run(['id' => $boardsId],'boardsId')) {
            return $boardsId;
        } else {
            $database = new Database();
            return $database -> getBoards()[0]['id'];
        }
    }
}