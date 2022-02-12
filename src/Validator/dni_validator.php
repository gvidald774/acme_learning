<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class dni_validator extends Constraint
{
    public $message = "{{ string }} no es un DNI válido";

    public function validate($value, Constraint $constraint)
    {
        if(!$constraint instanceof dni_validator) {
            throw new UnexpectedTypeException($constraint, dni_validator::class);
        }

        if(null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if ('strict' === $constraint->mode) {

        }

        if (!preg_match('/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/', $value, $matches)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
        else if (preg_match('/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/', $value, $matches)) {
            $dni_dividido = str_split($value, 8);
            $letra_calculada = "TRWAGMYFPDXBNJZSQVHLCKE"[intval($dni_dividido[0])%23];
            if($dni_dividido[1] != $letra_calculada)
            {
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{ string }}', $value)
                    ->addViolation();
            }
        }
    }
}