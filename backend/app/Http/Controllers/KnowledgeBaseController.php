<?php

namespace App\Http\Controllers;

use App\Models\KnowledgeBaseArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KnowledgeBaseController extends Controller
{
    public function index()
    {
        return KnowledgeBaseArticle::latest()->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'content' => 'required|string',
            'visibility' => 'required|string|max:50',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        $article = KnowledgeBaseArticle::create($validated);

        return response()->json($article, 201);
    }

    public function show(KnowledgeBaseArticle $knowledgeBaseArticle)
    {
        return $knowledgeBaseArticle;
    }

    public function update(Request $request, KnowledgeBaseArticle $knowledgeBaseArticle)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'category' => 'sometimes|required|string|max:100',
            'content' => 'sometimes|required|string',
            'visibility' => 'sometimes|required|string|max:50',
        ]);

        if (array_key_exists('title', $validated)) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $knowledgeBaseArticle->update($validated);

        return $knowledgeBaseArticle->fresh();
    }

    public function destroy(KnowledgeBaseArticle $knowledgeBaseArticle)
    {
        $knowledgeBaseArticle->delete();

        return response()->noContent();
    }
}