<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];

    public function service_providers():BelongsToMany
    {
        return $this->belongsToMany(ServiceProvider::class, 'service_provider_categories', 'category_id', 'service_provider_id');
    }
}
