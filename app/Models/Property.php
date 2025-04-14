<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
Use Illuminate\Database\Eloquent\Model;

class Property extends Model{
    use HasFactory;

    protected $table = 'properties';

    protected $fillable = [
        'user_id',
        'propName',
        'propDesc',
        'propPrice',
        'propAddress',
        'propArea',
        'image_1',
        'image_2',
        'image_3',
        'latitude',
        'longitude',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute(){
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}