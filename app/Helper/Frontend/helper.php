<?php

use Illuminate\Support\Facades\Auth;

function student()
{
    return Auth::guard('student')->user();
}
