<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 */
class NotesModel extends Model
{
    use HasFactory;
    protected $table = 'notes';
}
