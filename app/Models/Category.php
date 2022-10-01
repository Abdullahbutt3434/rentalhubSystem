<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static find(int $int)
 * @method static where(string $string, int $id)
 */
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    protected $table = 'categories';


    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
