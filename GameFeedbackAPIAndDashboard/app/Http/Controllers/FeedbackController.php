<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return response()->json($feedbacks);
    }
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'game_id' => 'required|integer|exists:game,id',
                'platform' => 'required|in:iOS,Android,Windows,macOS,Linux',
                'version' => 'required|regex:/^\d+\.\d+\.\d+$/',
                'category' => 'required|in:bug,suggestion,praise,inquiry',
                'content' => 'required|string|max:255',
            ]);
//            $validated['feedbackState'] = $validated['feedbackState'] ?? 'new';
            $feedback = Feedback::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Feedback submitted successfully!',
                'data' => $feedback,
            ], 201);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
