<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'link','for','category','image','tech'];
    public function project_images(){
        return $this->hasMany(ProjectImage::class);
    }
    public function project_techniques(){
        return $this->hasMany(ProjectTechnique::class);
    }
    protected function casts(): array
    {
        return [
            'tech' => 'array',
        ];
    }
}
