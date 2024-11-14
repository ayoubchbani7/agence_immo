<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Hash;

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
    // Accesseurs
    public function getSlug(): string
    {
        return \Str::slug($this->title);
    }
    // LocalScope
    public function scopeAvailable(Builder $builder): Builder
    {
        return $builder->where('sold',false);
    }
    public function scopeRecent(Builder $builder): Builder
    {
        return $builder->orderBy('created_at','desc');
    }
    // Casting (Accesseurs et mutateurs)
    protected function password():Attribute {
            return Attribute::make(
                get: fn(?string $value)=>'',
                set: fn(?string $value)=>Hash::make($value)
            );
    }
}