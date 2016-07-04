<?php

namespace Authvin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

abstract class AuthController extends Controller
{

  protected $username = 'username';

  /**
   * Handle a login request to the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function loginByEmailOrUsername(Request $request) {
    if(property_exists($this, 'username')) {
      $this->username = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
      $request->merge([$this->username => $request->input('login')]);
    }
    return $this->login($request);
  }

}
