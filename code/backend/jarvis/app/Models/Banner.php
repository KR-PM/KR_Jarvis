<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasDateTimeFormatter;
    use HasFactory;

    protected $table = 'banners';

    private function getActiveQuery(Builder $query): Builder
    {
        return $query->where('enabled', 1)
            ->where(function (Builder $query) {
                $query->where(function (Builder $query) {
                    $query->whereNotNull('start_date_time')
                        ->where('start_date_time', '<=', date('Y-m-d H:i:s'));
                })->orWhereNull('start_date_time');

            })->Where(function (Builder $query) {
                $query->where(function (Builder $query) {
                    $query->whereNotNull('end_date_time')
                        ->where('end_date_time', '>=', date('Y-m-d H:i:s'));
                })->orWhereNull('end_date_time');
            })->orderBy('order')->orderBy('id', 'desc');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $this->getActiveQuery($query);
    }
}
