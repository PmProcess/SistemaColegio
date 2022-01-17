<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RuleTotal implements Rule
{
    public $total;
    public $vista;
    public $total_aumento;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($total,$vista='create',$total_aumento=0)
    {
        $this->total=$total;
        $this->vista=$vista;
        $this->total_aumento=$total_aumento;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value>($this->vista=='create'?$this->total:$this->total+$this->total_aumento)?false:true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El pago es mayor a lo que se debe';
    }
}
