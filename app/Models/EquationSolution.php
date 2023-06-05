<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquationSolution extends Model
{
    use HasFactory;

    protected $fillable = ['hier', 'gibt', 'es', 'neues'];
    protected $table = 'equation_solutions';
}
