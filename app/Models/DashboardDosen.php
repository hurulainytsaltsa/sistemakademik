<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardDosen extends Model
{
    use HasFactory;
    protected $fillable = ['nik','nama','email','no_telp','prodi_id','alamat','jabatan'];
    protected $table = 'dosens';

    public function prodi()
    {
        return $this->belongsTo(DashboardProdi::class);
    }
}
