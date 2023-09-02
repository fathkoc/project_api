<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{

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
