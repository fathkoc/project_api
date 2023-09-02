<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
    @OA\Get(
    path="/task_management/project/{id}/issues",
    summary="Get issues by ID",
     *     tags={"Issues"},
     *     @OA\Parameter(
     *         name="id",
     *         description="Issue ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="limit",
     *         description="Number of items to return (default is 10)",
     *         required=false,
     *         in="query",
     *         @OA\Schema(
     *             type="integer",
     *             default=10
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="offset",
     *         description="Number of items to skip (default is 0)",
     *         required=false,
     *         in="query",
     *         @OA\Schema(
     *             type="integer",
     *             default=0
     *         )
     *     ),
     *     @OA\Response(response="200", description="List of issues"),
     * )

     */
    public function getIssues($id) {
        $limit = request()->input('limit', 10); // 'limit' parametresini alır, yoksa varsayılan olarak 10 kullanır.
        $offset = request()->input('offset', 0); // 'offset' parametresini alır, yoksa varsayılan olarak 0 kullanır.

        $project = Project::findOrFail($id);
        $issues = $project->issues()
            ->skip($offset) // Offset değerini uygula
            ->take($limit) // Limit değerini uygula
            ->get();

        return response()->json($issues);
    }



}
