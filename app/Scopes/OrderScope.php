<?php 

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OrderScope implements Scope
{
    private $__column;
    private $__direction;

    public function __construct($column = 'order', $direction = 'ASC')
    {
        $this->__column = $column;
        $this->__direction = $direction;
    }

    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy($this->__column, $this->__direction);
    }
}
