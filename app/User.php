<?php 
namespace App;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class User 
{
    public $dateAndTime;
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('id', new Assert\NotBlank());
        $metadata->addPropertyConstraint('id', new Assert\Positive());
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraint('name', new Assert\NotNull());
        $metadata->addPropertyConstraint('name', new Assert\Type([
            'type' => 'alpha']));
        $metadata->addPropertyConstraint(
            'name',
        new Assert\Length(["min" => 3, 'max' => 15])
        );
        $metadata->addPropertyConstraint('email', new Assert\NotBlank());
        $metadata->addPropertyConstraint('email', new Assert\Email([
            'message' => 'The email "{{ value }}" is not a valid email.',
        ]));
        $metadata->addPropertyConstraint('password', new Assert\NotBlank());
        $metadata->addPropertyConstraint(
            'password',
            new Assert\Length(["min" => 6, 'max' => 100])
        );
    }

    public function __construct(public int $id, public string $name, public string $email, public string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->dateAndTime = new DateTime();
    }

    public function getDateAndTime(): string
    {
        return $this->dateAndTime->format('Y-m-d H:i:s');
    }

    function __toString(): string
    {
        return ' id: ' . $this->id . "\n name: " . $this->name . "\n email: " . $this->email . 
        "\n password: " . $this->password ."\n";
    }
}
