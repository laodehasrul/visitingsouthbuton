<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
 use Illuminate\Http\JsonResponse;
use File;
use Illuminate\Support\Facades\Request;
use Image; 

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
