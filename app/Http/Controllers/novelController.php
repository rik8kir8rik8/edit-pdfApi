<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class novelController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        $type = $request->input('type');
 
        $html = $name.'と'.$type;
        return $html;
       
    }

      public function post(Request $request)
  {
    if ($request['name'] && $request['text']) {
    $name = $request['name'];
    $text = $request['text'];

    return json_encode($name);
  }
} 
}