<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Notebook;
use Illuminate\Http\JsonResponse;
use Exception;

class NotebookController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $notebooks = Notebook::latest()->get();
            return response()->json($notebooks);
        } catch (Exception $e) {
            return response()->json(['error' => 'Data fetch failed', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request): JsonResponse
    {
        // dd('ok');
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

            $notebook = Notebook::create($request->only('title', 'description'));

            return response()->json($notebook, 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Create failed', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $notebook = Notebook::findOrFail($id);
            return response()->json($notebook);
        } catch (Exception $e) {
            return response()->json(['error' => 'Notebook not found', 'message' => $e->getMessage()], 404);
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

            $notebook = Notebook::findOrFail($id);
            $notebook->update($request->only('title', 'description'));

            return response()->json($notebook);
        } catch (Exception $e) {
            return response()->json(['error' => 'Update failed', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $notebook = Notebook::findOrFail($id);
            $notebook->delete();

            return response()->json(['message' => 'Notebook deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Delete failed', 'message' => $e->getMessage()], 500);
        }
    }
}