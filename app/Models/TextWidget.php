<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class TextWidget extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'image',        
        'content',
        'title',
        'active'
    ];

    public static function getTitle($key)
    {

    $widget =  Cache::get('text-widget-'.$key, function() use($key){
            return TextWidget::query()
            ->where('key', '=', $key)
            ->where('active', '=', 1)
            ->first();
    
        });

    
        if($widget){
            return $widget->title;
        }
        return '';
    }


    public static function getContent($key)
    {
        $widget =  Cache::get('text-widget-'.$key, function() use($key){
            return TextWidget::query()
            ->where('key', '=', $key)
            ->where('active', '=', 1)
            ->first();
    
        });

        if($widget){
            return $widget->content;
        }
        return '';
    }



}
