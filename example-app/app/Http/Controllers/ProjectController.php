<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    const PAGE_SIZE = 10;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $products = Project::query()->paginate(self::PAGE_SIZE);
        return response()->json($products,Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @param Project $project
     * @return JsonResponse
     */
    public function show(Request $request,Project $project): JsonResponse
    {
        return response()->json($project,Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @param Project $project
     * @return JsonResponse
     */
    public function store(Request $request,Project $project): JsonResponse
    {
        $valid=$request->validate([
            'project_name' => 'required',
        ]);

        $project = new Project();
        $project->fill($valid);
        $project->save();
        return response()->json([
            'Done'
        ],Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @param Project $project
     * @return JsonResponse
     */
    public function destroy(Request $request,Project $project): JsonResponse
    {
        $project->delete();
        return response()->json([
            'Done'
        ],Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @param Project $project
     * @return JsonResponse
     */
    public function update(Request $request,Project $project): JsonResponse
    {
        $valid= $request->validate([
            'project_name'=> 'string|max=254',
            'completed_at'=> 'date',
        ]);
        $project->update($valid);
        return response()->json([
            'Done'
        ],Response::HTTP_OK);
    }
}
