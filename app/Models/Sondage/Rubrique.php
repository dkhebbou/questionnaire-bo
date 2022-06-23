<?php

namespace App\Models\Sondage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubrique extends Model
{
    protected $fillable = ['titre', 'titreAr'];
    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function questionnaire() {
        return $this->belongsTo(Questionnaire::class);
      }
}
