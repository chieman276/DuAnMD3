<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    protected $fillable = [
        'id', 'name'
    ];
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function district()
    {
        return $this->hasMany(District::class);
    }
}
