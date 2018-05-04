<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\StringHelper;
use Response;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function compare(Request $request)
    {
        if (!$request->has('input-text-1') || !$request->has('input-text-2')
            || empty($request->input('input-text-1')) || empty($request->input('input-text-2'))
            || !$request->has('compare-rate') || empty($request->input('compare-rate'))) {
            return Response::json(array(
                'code'      =>  500,
                'message'   =>  'Incorrect input'
            ), 200);
        }

        $sentences1 = StringHelper::splitText($request->input('input-text-1'));
        $sentences2 = StringHelper::splitText($request->input('input-text-2'));

        $result = StringHelper::compareTexts($sentences1, $sentences2, $request->input('compare-rate'));

        return Response::json(array(
            'code'      =>  200,
            'message'   =>  implode("<br />", $result)
        ), 200);
    }

}
