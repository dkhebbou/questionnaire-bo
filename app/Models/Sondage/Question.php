<?php

namespace App\Models\Sondage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $casts = [
        'option_name' => 'array',
        'option_nameAr' => 'array',
    ];
    protected $fillable = ['titre', 'titreAr', 'question_type', 'option_name', 'option_nameAr'];

    public function rubriques() {
      return $this->belongsTo(Rubrique::class);
    }

    public function reponses() {
        return $this->hasMany(Reponse::class);
    }

    protected $table = 'questions';
}
