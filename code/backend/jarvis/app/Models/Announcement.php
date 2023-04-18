<?php

namespace App\Models;

use App\Source\Definition\Time;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Announcement extends Model
{
    use HasDateTimeFormatter;
    use HasFactory;

    protected $table = 'announcements';

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

    public function scopeActiveById(Builder $query, array $args): Builder
    {
        $query = $this->getActiveQuery($query);
        return $query->where('id', $args['id']);
    }
}
