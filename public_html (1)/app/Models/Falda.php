<?php

namespace App\Models;

use CodeIgniter\Model;

class Falda extends Model {
    protected $table = 'falda';

    protected $primaryKey = 'cliente_id';
    protected $allowedFields = ['largo', 'cintura', 'cadera', 'estado' ,'cliente_id'];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function clientes() {
        return $this->hasMany(Cliente::class, 'cliente_id');
    }
}
