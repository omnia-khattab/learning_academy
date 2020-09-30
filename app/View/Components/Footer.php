<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Setting;
class Footer extends Component
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
        $setting=Setting::get();
        return view('components.footer',[
            'setting'=> $setting
        ]);
    }
}
