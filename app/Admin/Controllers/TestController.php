<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Multidots\Admin\Facades\Admin;

class TestController extends Controller
{

    public function index()
    {
        echo '<pre>';
        print_r('welcome to main admin panel');
        die;
    }
}
