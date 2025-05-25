<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ServiceProvider extends Model
{

    protected $table = 'service_providers';

    protected $fillable = [
        'name',
        'description',
        'logo_url',
        'website_url',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'service_provider_categories', 'service_provider_id', 'category_id');
    }
}
