<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Inputs extends Component {
	public $name;
	public $type;
	public $label;
	public $placeholder;
	public $note;
	public $old;
	public $values;
	public $disabled;
	
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $type = 'text', $label = '', $placeholder = '', $note = '', $old = '', $values = [], $disabled = null) {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label === '' ? ucwords(str_replace('_', ' ', $name)) : $label;
        $this->placeholder = $placeholder === '' ? $this->label : $placeholder;
        $this->note = $note;
        $this->old = $old;
        $this->values = $values;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        return view('components.inputs');
    }
}