<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\TextWidget;

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
        return view('components.sidebar', compact('title','content'));
    }
}
