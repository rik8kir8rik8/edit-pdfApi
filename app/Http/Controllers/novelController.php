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
    if ($request['text']) {
    $txt = $request['text'];
    $txt = str_replace(array("\r\n", "\r", "\n"), "\n", $txt);
    $arr = explode("\n", $txt);
    $rows_array = array();

    foreach ($arr as $row) {
      $len = mb_strlen($row);
      $s = round($len / 33);
     /* if($s >= 3){
        $cutRows = str_split($row,66);
        foreach ($cutRows as $a) {
          $cutlen = mb_strlen($a);
          $cuts = round($cutlen / 33);
          $sub_array = array("rowCount" => $cuts,"rowTxt" => $a,);
        array_push($rows_array, $sub_array);
      }
    }
      else
      { */

        array_push($rows_array, array('rowCount'=>$s+1, 'rowTxt'=>$row));
    }

      return json_encode($rows_array, JSON_UNESCAPED_UNICODE);
    } 
  } 
}
