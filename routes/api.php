<?php

# Importing Laravel API Dependencies
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

# Fetching Weather Details by Location
Route::get('geocode', function (Request $request)
{
    # Capturing API Response
    $response = Http::get(env('OPENWEATHER_GEOCODE_URL'), [
        # Preparing API Request
        'q' => $request->input('city'),
        'limit' => 1,
        'appid' => env('OPENWEATHER_API_KEY')
    ]);

    #Extracting Response as JSON
    return $response->json();
});

# Default Weather Settings
Route::get('/weather', function (Request $request)
{
    $response = Http::get(env('OPENWEATHER_ONE_CALL_URL'), [
        # Preparing API Request
        'lat' => $request->input('lat'),
        'lon' => $request->input('lon'),
        'exclude' => 'minutely, hourly',
        'units'=> 'metric',
        'appid' => env('OPENWEATHER_API_KEY')
    ]);

    #Extracting Response as JSON
    return $response->json();
});
?>