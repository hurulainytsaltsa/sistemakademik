<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Prodi extends Model
{
    use HasFactory;

    public function mahasiswa(){
        return $this->hasMany(Mahasiswa::class);
    }

    public function scopePencarian(Builder $query): void
    {
        if ($search = request('search')) {
            $query->where('nama', 'like', '%' . $search . '%');

        }
    }
}
