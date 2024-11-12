<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory;
    protected $table ="properties" ;
    protected $fillable = ['title','description','surface','rooms','bedrooms','floor','price','city','code_postal','sold'];
    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class, 'properties_options', 'property_id', 'option_id')
                    ;
    }

    public function getSlug(): string
    {
        return \Str::slug($this->title);
    }
}
