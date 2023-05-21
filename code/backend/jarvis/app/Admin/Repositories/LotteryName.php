<?php

namespace App\Admin\Repositories;

use App\Models\LotteryName as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class LotteryName extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
