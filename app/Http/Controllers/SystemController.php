<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;

class SystemController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function tasks($status)
    {
        return view('dashboard.tasks', compact('status'));
    }

    public function Tagtasks(Tag $tag)
    {
        return view('dashboard.tag-tasks', compact('tag'));
    }

    public function categoryTasks(Category $category)
    {
        return view('dashboard.category-tasks', compact('category'));
    }

    public function profile()
    {
        return view('dashboard.profile');
    }
}
