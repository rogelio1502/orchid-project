<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Orchid\Screen\Field;


class Hello extends Field
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('hello');
    }
}
