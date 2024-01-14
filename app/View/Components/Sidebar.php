<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\TextWidget;
use Illuminate\Support\Facades\DB;

class Sidebar extends Component
{

 
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
       $title =  Textwidget::getTitle('about-us-sidebar');
        $content =  Textwidget::getContent('about-us-sidebar');

        $categories = Category::query()
        ->leftJoin('category_post', 'categories.id', '=', 'category_post.category_id')
        ->select('categories.title', 'categories.slug', DB::raw('count(*) as total'))
        ->groupBy('categories.id','categories.title','categories.slug' )
        ->orderByDesc('total')
        ->limit(5)
        ->get();








        return view('components.sidebar', compact('title','content', 'categories'));
    }
}

