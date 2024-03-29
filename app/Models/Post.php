<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        
        
    'title', 
    'slug',
    'thunbnail',
    'body',
    'active',
    'published_at',
    'user_id'


];

protected $casts = [
    'published_at' => 'datetime'
];


public function user(){
    return $this->belongsTo(User::class);
}


public function categories(){
    return $this->belongsToMany(Category::class);
}

public function getFormateDate()
{
    // dd($this->published_at);
    return $this->published_at->format('F js Y');
}

public function shortBody()
{
    return Str::words(strip_tags($this->body), 30);
}

public function getThumbnail(){
    if (str_starts_with($this->thunbnail, 'http')){
        return $this->thunbnail;
    }

    return '/storage/'.$this->thunbnail;
}

}
