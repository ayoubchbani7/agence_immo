<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Proprety extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','surface','rooms','bedrooms','floor','price','city','code_postal','sold'];

    public function options():BelongsToMany{
        return $this->belongsToMany(Option::class, 'option_proprety', 'proprety_id', 'option_id');
    }
}
