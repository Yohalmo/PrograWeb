<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Usuario extends Authenticatable
{
    use HasRoles;
    use HasFactory, Notifiable;
    protected $table = 'usuarios';
    protected $primaryKey = 'IdUsuario';
    public $timestamps = false;
}
