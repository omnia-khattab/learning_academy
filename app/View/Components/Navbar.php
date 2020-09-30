<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Category;
class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $categories=Category::get();
        return view('components.navbar',[
            'categories'=> $categories
        ]);
    }
}
