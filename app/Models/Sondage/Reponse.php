<?php

namespace App\Models\Sondage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $fillable = ['answer'];
    protected $table = 'reponses';

    public function questionnaire() {
      return $this->belongsTo(Questionnaire::class);
    }

    public function rubrique() {
      return $this->belongsTo(Rubrique::class);
    }
}
