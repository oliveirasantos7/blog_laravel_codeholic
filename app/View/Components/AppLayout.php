<?php

namespace App\View\Components;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;

class AppLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {


        $categories = Category::query()
        ->leftJoin('category_post', 'categories.id', '=', 'category_post.category_id')
        ->select('categories.title', 'categories.slug', DB::raw('count(*) as total'))
        ->groupBy('categories.id','categories.title','categories.slug' )
        ->orderByDesc('total')
        ->limit(5)
        ->get();




      

        return view('components.layouts.app', compact('categories'));
    }
}
