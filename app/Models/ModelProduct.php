<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ModelProduct extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'm_products';
    protected $guarded = [];
    protected function serializeDate(\DateTimeInterface $date)
    {
      return $date->format('Y-m-d H:i:s');
    }
}
