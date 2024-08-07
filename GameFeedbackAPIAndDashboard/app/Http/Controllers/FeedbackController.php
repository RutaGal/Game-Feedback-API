<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Rules\ValidCategoryType;
use App\Rules\ValidFeedbackStateType;
use App\Rules\ValidPlatformType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();

        $formattedFeedbacks = $feedbacks->map(function ($feedback) {
            return [
                'id' => $feedback->id,
                'game_name' => $feedback->game->name,
                'feedbackState' => $feedback->feedbackState,
                'platform' => $feedback->platform,
                'version' => $feedback->version,
                'category' => $feedback->category,
                'content' => $feedback->content,
                'created_at' => $feedback->created_at,
                'updated_at' => $feedback->updated_at,
            ];
        });

        return response()->json($formattedFeedbacks);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'game_id' => 'required|integer|exists:game,id',
            'platform' => ['required', 'string', new ValidPlatformType()],
            'version' => 'required|regex:/^\d+\.\d+\.\d+$/',
            'category' => ['required', 'string', new ValidCategoryType()],
            'content' => 'required|string|max:255',
        ]);
        $validated['feedbackState'] = $validated['feedbackState'] ?? 'new';

        $feedback = Feedback::create($validated);

        return response()->json([
            'message' => 'Feedback submitted successfully!',
            'data' => $feedback,
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'feedbackState' => ['required', 'string', new ValidFeedbackStateType()]
        ]);

        $feedback = Feedback::find($id);

        if (!$feedback) {
            return  response()->json([
                'message' => 'Feedback not found.',
            ], Response::HTTP_NOT_FOUND);
        }

        // Update the feedback state
        $feedback->feedbackState = $validated['feedbackState'];
        $feedback->save();

        return response()->json([
            'message' => 'Feedback updated successfully!',
            'data' => $feedback,
        ], Response::HTTP_OK);
    }
}
