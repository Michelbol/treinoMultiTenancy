<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Tenant\TenantManager;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        $data =  $request->only($this->username(), 'password');
        $tenantManager = app(TenantManager::class);
        if($tenantManager->getTenant() && !$tenantManager->isSubdomainException()){
            $data['empresa_id'] = $tenantManager->getTenant()->id;
            $this->redirectTo = '/home';
        }

        return $data;
    }
}
