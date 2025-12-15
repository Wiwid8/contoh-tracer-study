<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'role'];

    // Roles: alumni, admin, super_admin
    public function isAlumni() { return $this->role === 'alumni'; }
    public function isAdmin() { return in_array($this->role, ['admin', 'super_admin']); }
    public function isSuperAdmin() { return $this->role === 'super_admin'; }
}
