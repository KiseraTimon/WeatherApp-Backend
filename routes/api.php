<?php

# Importing Laravel API Dependencies
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

# Importing Error Logging Mechaanism
use App\Helpers\ErrorLogger;

# Fetching Weather Details by Location
Route::get('geocode', function (Request $request)
{
    try
    {
        # Capturing API Response
        $response =

            # Preparing API Request
            Http::get(env('OPENWEATHER_GEOCODE_URL'), [
                # Retrieving City From Query Params
                'q' => $request->input('city'),

                # Retrieving First Result From Query Results
                'limit' => 1,

                # Applying API Key
                'appid' => env('OPENWEATHER_API_KEY')
            ]);

        # Handling Failed Requests
        if($response->failed())
        {
            return response()->json(["An Error Occured Retrieving Weather in Your Location. Try again later"]);
        }

        # Extracting Response as JSON
        return $response->json();
    }
    catch (\Throwable $e)
    {
        ErrorLogger::handle($e);
        return response()->json(["message" => "Geolocation Services Unavailable. Try Again Later."], 500);
    }
});

# Default Weather Settings
Route::get('/weather', function (Request $request)
{
    try
    {
        # Capturing API Response
        $response =

            #Preparing API Request
            Http::get(env('OPENWEATHER_FORECAST_URL'), [
                # Retrieving Latitude From Query Params
                'lat' => $request->input('lat'),

                # Retrieving Longitude From Query Params
                'lon' => $request->input('lon'),

                # Converting Temp Units to Celsius
                'units'=> 'metric',

                # Applying API Key
                'appid' => env('OPENWEATHER_API_KEY')
            ]);

        # Handling Failed Requests
        if($response->failed())
        {
            return response()->json(["An Error Occurred Retrieving Weather Details"]);
        }

        # Extracting Response as JSON
        return $response->json();
    }
    catch (\Throwable $e)
    {
        ErrorLogger::handle($e);
        return response()->json(['message'=> 'Weather Data Unavailable. Try Again Later'], 500);
    }
});
?>