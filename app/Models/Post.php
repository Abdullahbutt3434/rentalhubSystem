<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

/**
 * @method static find($id)
 * @method static create(string[] $array)
 * @method static where(string $string, string $string1)
 */
class Post extends Model
{
    use HasFactory;
//    protected $dateFormat = 'U';
    protected $table = 'posts';
    protected $fillable = [
        'title', 'amenities','description','city' , 'location', 'total_area', 'rent','condition','image1','image2','image3','status','bedroom','bathroom','kitchen','category_id','user_id'
    ];

    public function setCatAttribute($value)
    {
        $this->attributes['amenities'] = json_encode($value);
    }

    /**
     * Get the categories
     *
     */
    public function getCatAttribute($value)
    {
        return $this->attributes['amenities'] = json_decode($value);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
