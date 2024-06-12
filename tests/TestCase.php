<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Auth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // acting as role admin with permission
    public function actingAsAdmin()
    {
        $user = Auth::loginUsingId(1);
        $this->actingAs($user);
    }

    // acting as role mahasiswa mbkm
    public function actingAsUserMbkm()
    {
        $user = Auth::loginUsingId(7);
        $this->actingAs($user);
    }

    // logout
    public function logout()
    {
        Auth::logout();
    }
}
