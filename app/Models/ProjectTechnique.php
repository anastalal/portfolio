<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectTechnique extends Model
{
    use HasFactory;
    protected $fillable = ['project_id', 'technique'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
