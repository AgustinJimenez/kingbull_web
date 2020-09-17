<?php namespace App\Http\Middleware;

use Closure;

class VerifyUserToken
{

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($re, Closure $next)
	{
		$profile_exists = \Profile::where('user_token', $re->get('user_token'))->exists();
		if( $re->has('user_token') and $re->get('user_token') and $profile_exists )
			return $next( $re );
		else
			if( !$re->has('user_token') )
				return response()->json(['status' => 'NOK', 'message' => "ERROR: Token not found"]);
			else if(!$profile_exists)
				return response()->json(['status' => 'NOK', 'message' => "ERROR: Profile not found."]);
			else
				return response()->json(['status' => 'NOK']);
	}

}