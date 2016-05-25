<?php

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class Usuario {
    
    public $nome;
    public $email;
    
    static public function loadValidatorMetadata(ClassMetadata $metadata) {
        $metadata->addPropertyConstraint('nome', new Assert\Length(array(
            'min' => 4,
            'minMessage' => 'O Nome deve ser maior que 4 caracteres.'
        )));
        $metadata->addPropertyConstraint('nome', new Assert\NotBlank(array(
            'message' => 'O Nome é requerido.'
        )));
        $metadata->addPropertyConstraint('email', new Assert\NotBlank(array(
            'message' => 'O E-mail é requerido.'
        )));
        $metadata->addPropertyConstraint('email', new Assert\Email(array(
            'message' => 'O E-mail não foi preenchido corretamente.'
        )));
    }
}