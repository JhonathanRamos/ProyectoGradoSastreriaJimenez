<?php

namespace App\Models;

use CodeIgniter\Model;

class Pantalon extends Model {
    protected $table = 'pantalon';
    protected $primaryKey = 'cliente_id';
    protected $allowedFields = ['largo', 'entrepierna','cintura', 'cadera', 'pierna', 'rodilla', 'bota', 'cliente_id'];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function clientes() {
        return $this->hasMany(Cliente::class, 'cliente_id');
    }
    
    
}
