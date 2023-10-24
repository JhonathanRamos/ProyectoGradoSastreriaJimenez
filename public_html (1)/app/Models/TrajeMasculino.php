<?php

namespace App\Models;

use CodeIgniter\Model;

class TrajeMasculino extends Model {
    protected $table = 'traje_masculino';
    protected $allowedFields = ['talle', 'largo', 'hombro', 'ancho', 'pecho', 'estomago', 'largoManga', 'cliente_id'];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function clientes() {
        return $this->hasMany(Cliente::class, 'cliente_id');
    }
}
