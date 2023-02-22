<?php

namespace Indianic\MenuManagement\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravie\SerializesQuery\Eloquent;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Menu extends Model implements Sortable
{
    use HasFactory;

    use SortableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'parent_id',
        'name',
        'is_external_url',
        'url',
        'sort_order',
        'icon'
    ];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo($this, 'parent_id');
    }
    public function menus(): HasMany
    {
        return  $this->hasMany($this, 'parent_id');
    }
}
