<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function () {
    return View::make('home');
});

// POST URL to handle form submission and make outbound call
Route::post('/call', function () {
    // Get form input
    $userPhone = Input::get('userPhone');
    $encodedSalesPhone = urlencode(str_replace(' ','',Input::get('salesPhone')));
    // Set URL for outbound call - this should be your public server URL
    $host = parse_url(Request::url(), PHP_URL_HOST);

    // Create authenticated REST client using account credentials in
    // <project root dir>/.env.php
    $sid = 'ACe6be3fbdf1b89841ec4b8e518258afc8';
    $token = '03dfcbc3701f0d3b3d8b8cd611ee86e8';
    
    $client = new Twilio\Rest\Client( $sid ,$token  );

    try {
        $client->calls->create(
            $userPhone, // The visitor's phone number
            getenv('+16055242696'), // A Twilio number in your account
            array(
                "url" => "http://$host/outbound/$encodedSalesPhone"
            )
        );
    } catch (Exception $e) {
        // Failed calls will throw
        return $e;
    }

    // return a JSON response
    return array('message' => 'Call incoming!');
});

// POST URL to handle form submission and make outbound call
Route::post('/outbound/{salesPhone}', function ($salesPhone) {
    // A message for Twilio's TTS engine to repeat
    $sayMessage = 'Thanks for contacting our sales department. Our
        next available representative will take your call.';

    $twiml = new Twilio\Twiml();
    $twiml->say($sayMessage, array('voice' => 'alice'));
    $twiml->dial($salesPhone);

    $response = Response::make($twiml, 200);
    $response->header('Content-Type', 'text/xml');
    return $response;
});