<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class HasValidCaptcha
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $turnstileCode = $request->input('cf-turnstile-response') ?? '';

        if (!$this->turnstileCodeIsValid($turnstileCode)) {
            Alert::error('Error', 'Captcha tidak valid');
            return redirect()->back();
        }

        return $next($request);
    }

    private function turnstileCodeIsValid(string $turnstileCode): bool
    {
        return Http::post(
            url: 'https://challenges.cloudflare.com/turnstile/v0/siteverify',
            data: [
                'secret' => config('services.cloudflare.turnstile.site_secret'),
                'response' => $turnstileCode,
            ]
        )->json('success');
    }
}
