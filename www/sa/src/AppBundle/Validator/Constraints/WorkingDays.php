<?php


namespace AppBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;

/**
 * Class WorkingDays
 * @package AppBundle\Validator\Constraints
 * @Annotation
 */
class WorkingDays extends Constraint
{
    public $message = 'Date "{{ date }}" is weekend date';

    public function validatedBy()
    {
        return \get_class($this).'Validator';
    }
}