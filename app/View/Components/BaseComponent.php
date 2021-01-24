<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class BaseComponent extends Component
{
    /**
     * @var Model
     */
    public $resource;

    /**
     * BaseComponent constructor.
     *
     * @param Model $country
     */
    public function __construct(Model $country)
    {
        $this->resource = $country;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $view = Str::singular($this->resource->getTable());

        return view("components.{$view}-form");
    }

    /**
     * Form method.
     *
     * @return string
     */
    public function method()
    {
        if (! $this->resource->exists) {
            return 'POST';
        }

        return 'PUT';
    }

    /**
     * Form action.
     *
     * @return string
     */
    public function action()
    {
        $table = $this->resource->getTable();

        if (! $this->resource->exists) {
            return route("{$table}.store");
        }

        return route("{$table}.update", $this->resource->id);
    }
}
