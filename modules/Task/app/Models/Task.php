<?php

namespace Modules\Task\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Project\App\Models\Project;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Task extends Model implements Sortable
{
    use HasFactory, HasUuids, SoftDeletes, SortableTrait;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'priority',
        'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * This function reorders the records:
     * the record with the first id in the array will get order 1,
     * the record with the second id will get order 2, ...
     */
    public static function order($ids, int $startOrder = 1, string $primaryKeyColumn = null, callable $modifyQuery = null): void
    {
        self::setNewOrder($ids, $startOrder, $primaryKeyColumn, $modifyQuery);
    }
}
