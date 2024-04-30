<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title', 'body', 'category_id', 'user_id'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public static function unrevisedCount()
    {
        return Article::where('is_accepted', null)->count();
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public function toSearchableArray()
    {
        $category = $this->category;

        $array = [
            'title' => $this->title,
            'body' => $this->body,
            'category' => $category,
            'id' => $this->id
        ];

        return $array;
    }
}
