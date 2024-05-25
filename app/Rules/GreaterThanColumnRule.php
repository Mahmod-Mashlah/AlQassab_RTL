<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\ValidationRule;

class GreaterThanColumnRule implements ValidationRule
{
    protected $table, $column;

    public function __construct($table, $column)
    {
        $this->table = $table;
        $this->column = $column;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function passes($attribute, $value)
    {
        $columnValue = DB::table($this->table)->value($this->column);

        return $value > $columnValue;
    }

    public function message()
    {
        return 'The :attribute must be greater than the ' . $this->column . ' value.';
    }
}
