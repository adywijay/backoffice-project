<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class RedirectPages extends Controller
{
    public function notFound()
    {
        return view('authenticationV1.page.not_found');
    }
}
