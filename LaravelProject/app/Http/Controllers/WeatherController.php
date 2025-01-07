<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        // Fetch the city from user input or default to 'Kathmandu'
        $city = $request->input('city', 'Kathmandu');

        try {
            // Make the API request
            $response = Http::withoutVerifying()->get('https://api.openweathermap.org/data/2.5/weather', [
                'q' => $city,
                'appid' => env('WEATHER_API_KEY'),
                'units' => 'metric',
            ]);

            if ($response->successful()) {
                $weatherData = $response->json();
                return view('contact', ['weatherData' => $weatherData]);
            } else {
                return view('contact', ['error' => 'Unable to fetch weather data.']);
            }
        } catch (\Exception $e) {
            return view('contact', ['error' => 'Error occurred: ' . $e->getMessage()]);
        }
    }
}
