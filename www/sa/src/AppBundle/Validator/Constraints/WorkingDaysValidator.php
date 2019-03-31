<?php


namespace AppBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class WorkingDaysValidator extends ConstraintValidator
{

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     * @throws UnexpectedTypeException
     * @throws \Exception
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof WorkingDays) {
            throw new UnexpectedTypeException($constraint, WorkingDays::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) take care of that
        if (null === $value || '' === $value) {
            return;
        }

        if ($value instanceof \DateTime) {
            throw new UnexpectedTypeException($value, 'DateTime');
        }

        $value = new \DateTime();

        if (date('N', $value) >= 6) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ data }}', $value->format('Y-m-d'))
                ->addViolation();
        }
    }
}