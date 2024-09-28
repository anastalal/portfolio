<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;
    protected $table = 'about_me';
    protected $fillable = [
        'description',
        'email',
        'job_title',
        'name',
        'phone',
        'dob',
        'cv_file',
        'location',
        'seo_title',
        'seo_description',
        'open_graph_image',
        'links'
    ,'image'];
    protected function casts(): array
    {
        return [
            'links' => 'array',
        ];
    }
}
