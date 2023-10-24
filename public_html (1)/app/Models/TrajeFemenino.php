<?php

namespace App\Models;

use CodeIgniter\Model;

class TrajeFemenino extends Model {
    protected $table = 'traje_femenino';
    protected $allowedFields = ['talle', 'largo', 'hombro', 'ancho', 'pecho', 'cintura', 'cadera' ,'largoManga', 'cliente_id'];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function clientes() {
        return $this->hasMany(Cliente::class, 'cliente_id');
    }
    
}
