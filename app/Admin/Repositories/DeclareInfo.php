<?php

namespace App\Admin\Repositories;

use App\Models\DeclareInfo as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class DeclareInfo extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
