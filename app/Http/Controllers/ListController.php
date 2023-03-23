<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ListController extends Controller
{
    public function listPlanets()
    {
        $response = Http::get('https://swapi.dev/api/planets');

        if ($response->status() == 200) {
            return response()->json([
                'planets' => $response->json()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Sorry, something went wrong.'
            ], 500);
        }

    }

    public function listPeople()
    {
        $response = Http::get('https://swapi.dev/api/people');

        if ($response->status() == 200) {
            return response()->json([
                'people' => $response->json()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Sorry, something went wrong.'
            ], 500);
        }

    }

    public function listStarships()
    {
        $response = Http::get('https://swapi.dev/api/starships');

        if ($response->status() == 200) {
            return response()->json([
                'starships' => $response->json()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Sorry, something went wrong.'
            ], 500);
        }

    }

    public function searchPerson($search)
    {
        $response = Http::get('https://swapi.dev/api/people?'.$search);

        if ($response->status() == 200) {
            return response()->json([
                'person' => $response->json()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Sorry, something went wrong.'
            ], 500);
        }

    }
}
