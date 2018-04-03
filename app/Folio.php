<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folio extends Model
{
  protected $table = 'folio';
    protected $primaryKey='id';
   protected $fillable = [
      'nombre'
   ];
}
