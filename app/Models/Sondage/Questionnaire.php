<?php

namespace App\Models\Sondage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = ['titre', 'description', 'titreAr', 'descriptionAr', 'statut', 'slug'];
  protected $dates = ['deleted_at'];
  protected $table = 'questionnaires';

  public function rubriques() {
    return $this->hasMany(Rubrique::class);
  }
}
