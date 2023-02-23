<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
  
    protected $table            = 'usuarios';
    
    protected $returnType       = 'App\Entities\Usuario';
    protected $useSoftDeletes   = true; //Explicas essa caracteristica
    protected $allowedFields    = [
    
    'nome',
    'email',
    'password',
    'reset_hash',
    'reset_expira_em',
    'imagem',
    //Nуo colocaremos o campo ativo... Pois existe a manipulaчуo de formulario
    
    
    
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $deletedField  = 'deletado_em';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
   
    // Callbacks
    protected $beforeInsert   = [];
    protected $beforeUpdate   = [];
    }