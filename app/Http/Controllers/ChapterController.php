<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Chapter;
use Illuminate\Support\Facades\Validator;



class ChapterController extends Controller
{
    public function index(Request $request)
    {
        $chapter = Chapter::query();

        $courseId = $request->query('course_id');

        $chapter->when($courseId, function ($query) use ($courseId) {
            return $query->where('course_id', '=', $courseId);
        });

        return response()->json([
            'status' => 'success',
            'data' => $chapter->get()
        ]);
    }


    public function show($id)
    {
        $chapter = Chapter::find($id);

        if (!$chapter) {
            return response()->json([
                'status' => 'error',
                'message' => 'chaper not found'
            ], 404);
        }

        return response()->json([
            'status' => 'succes',
            'data' => $chapter
        ]);
    }



    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'course_id' => 'required|integer'
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $courseId = $request->input('course_id');
        $couse = Course::find($courseId);

        if (!$couse) {
            return response()->json([
                'status' => 'error',
                'message' => 'course not found'
            ], 400);
        }

        $chapter = Chapter::create($data);

        return response()->json([
            'status' => 'succes',
            'data' => $chapter
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'string',
            'course_id' => 'integer'
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $chapter = Chapter::find($id);
        if (!$chapter) {
            return response()->json([
                'status' => 'error',
                'message' => 'chapter not found'
            ], 404);
        }

        $courseId = $request->input('course_id');
        if ($courseId) {
            $course = Course::find($courseId);
            if (!$course) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'course not found'
                ], 400);
            }
        }

        $chapter->fill($data);
        $chapter->save();

        return response()->json([
            'status' => 'succes',
            'data' => $chapter
        ]);
    }

    public function destroy($id)
    {
        $chapter = Chapter::find($id);

        if (!$chapter) {
            return response()->json([
                'status' => 'error',
                'message' => 'chapter not found'
            ], 404);
        }

        $chapter->delete();

        return response()->json([
            'status' => 'succes',
            'message' => 'chapter deleted'
        ]);
    }
}
