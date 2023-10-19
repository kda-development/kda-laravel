<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ModelCustomer extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'm_customer';
    protected function serializeDate(\DateTimeInterface $date)
    {
      return $date->format('Y-m-d H:i:s');
    }
    protected $fillable = [
        'name',
        'phone_number',
    ];
}
