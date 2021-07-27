<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    public function getAction()
    {
        return view('example.example', ['methodName' => 'To jest get']);
    }
    public function postAction()
    {
        return view('example.example', ['methodName' => 'To jest post']);
    }
    public function putAction()
    {
        return view('example.example', ['methodName' => 'To jest put']);
    }
    public function patchAction()
    {
        return view('example.example', ['methodName' => 'To jest patch']);
    }
    public function deleteAction()
    {
        return view('example.example', ['methodName' => 'To jest delete']);
    }
    public function optionsAction()
    {
        return view('example.example', ['methodName' => 'To jest options']);
    }
}
