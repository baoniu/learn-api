<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $code = 200;

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }
    /**
     * @param int $code
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }
    public function responseNotFound($message = 'Not found')
    {
        return $this->setCode(404)->responseError($message);
    }
    public function responseError($message)
    {
        return $this->response([
            'status' =>'failed',
            'errors' => [
                'code'   =>$this->getCode(),
                'message'=>$message
            ]
        ]);
    }
    protected function response($data)
    {
        return \Response::json($data, $this->getCode());
    }
}
