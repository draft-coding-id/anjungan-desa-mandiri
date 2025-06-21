<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Warga extends Authenticatable
{
    use HasFactory;

    protected $table = 'warga';

    protected $fillable = [
        'nik',
        'pin',
        'nama_lengkap',
        'agama',
        'tempat_lahir',
        'tanggal_lahir',
        'usia',
        'pekerjaan',
        'jenis_kelamin',
        'kecamatan',
        'desa',
        'alamat',
        'rt',
        'rw',
    ];

    protected $hidden = [
        'pin',
        'remember_token',
    ];

    protected $casts = [
        'pin' => 'hashed',
    ];

    protected $guard = 'warga';

    /**
     * GetAuthPasswword
     *
     * @return void
     */

    public function getAuthIdentifierName()
    {
        return 'nik';
    }

    /**
     * GetAuthPassword
     *
     * @return void
     */
    public function getAuthPassword()
    {
        return $this->pin;
    }
}
