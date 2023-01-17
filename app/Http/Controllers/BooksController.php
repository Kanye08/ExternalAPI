<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BooksController extends Controller
{
    public function index()
    {
        $response = Http::get('https://www.anapioficeandfire.com/api/books');
        $books = json_decode($response->body(), true);

        // return $books;

        if (is_array($books) && count($books) > 0) {
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'data' => $books
            ]);
        } else {
            return response()->json([
                'status_code' => 404,
                'status' => 'Not found!',
                'data' => []
            ]);
        }
    }



    // for the seeded values, use the code below
    // return Books::all();


    public function store(Request $request)
    {
        $data = $request->all();
        $response = Http::post('https://www.anapioficeandfire.com/api/books', $data);
        $books = json_decode($response->body(), true);

        // return $books;

        if (is_array($books) && count($books) > 0) {
            return response()->json([
                'status_code' => 201,
                'status' => 'success',
                'data' => $books
            ]);
        } else {
            return response()->json([
                'status_code' => 404,
                'status' => 'Not found!',
                'data' => []
            ]);
        }


        // to check the ones seeded locally
        // $book = Books::create($request->all());
        // return response()->json($book, 201);
    }

    public function show($id)
    {
        $response = Http::get("https://www.anapioficeandfire.com/api/books/{$id}");
        $books = json_decode($response->body(), true);
        // return $books;

        if (is_array($books) && count($books) > 0) {
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'data' => $books
            ]);
        } else {
            return response()->json([
                'status_code' => 404,
                'status' => 'Not found!',
                'data' => []
            ]);
        }


        // to check the ones seeded locally
        // return Books::findOrFail($id);
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();
        $response = Http::put("https://www.anapioficeandfire.com/api/books/{$id}", $data);
        $books = json_decode($response->body(), true);

        // return $books;

        if (is_array($books) && count($books) > 0) {
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' =>  'Book Record was updated successfully!',
                'data' => $books
            ]);
        } else {
            return response()->json([
                'status_code' => 404,
                'status' => 'Not found',
                'data' => []
            ]);
        }


        // to check the ones seeded locally
        // $books = Books::findOrFail($id);
        // $books->update($request->all());
        // return $books;
    }

    public function destroy($id)
    {
        $response = Http::delete("https://www.anapioficeandfire.com/api/books/{$id}");
        $books = $response->json();
        // return $books;

        if ($response->status() == 204) {
            return response()->json([
                'status_code' => 204,
                'status' => 'success',
                'message' =>  'Book Record was deleted successfully!',
                'data' => $books
            ]);
        } else {
            return response()->json([
                'status_code' => 400,
                'status' => 'Error',
                'data' => []
            ]);
        }



        // to check the ones seeded locally
        // $books = Books::findOrFail($id);
        // $books->delete();
        // return response()->json(null, 204);
    }

    public function search(Request $request, $query)
    {

        $query = $request->input('query');
        $response = Http::get("https://www.anapioficeandfire.com/api/books?name={$query}");
        $response = Http::get("https://www.anapioficeandfire.com/api/books?country={$query}");
        $response = Http::get("https://www.anapioficeandfire.com/api/books?publisher={$query}");
        $response = Http::get("https://www.anapioficeandfire.com/api/books?released={$query}");
        $books = json_decode($response->body(), true);
        // $books =  Books::where('name', 'like', "%{$query}%")
        //     ->orWhere('country', 'like', "%{$query}%")
        //     ->orWhere('publisher', 'like', "%{$query}%")
        //     ->orWhere('released', 'like', "%{$query}%")
        //     ->get();
        // $response->json();


        // return $books;

        if (is_array($books) && count($books) > 0) {
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' =>  'Record Found!',
                'data' => $books
            ]);
        } else {
            return response()->json([
                'status_code' => 404,
                'status' => 'Not found!',
                'data' => []
            ]);
        }
    }
}
        // to check the ones seeded locally
        // $query = $request->input('query');
        // $books = Books::where('name', 'like', "%{$query}%")
        //     ->orWhere('country', 'like', "%{$query}%")
        //     ->orWhere('publisher', 'like', "%{$query}%")
        //     ->orWhere('released', 'like', "%{$query}%")
        //     ->get();
        // return $books;