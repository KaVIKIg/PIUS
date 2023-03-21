<?php 
require '../vendor/autoload.php';
use App\Comment;
use App\User;
use Symfony\Component\Validator\Validation;

$user1 = new User(121, "Viktori", "email@mail.ru", "123qwe!?");
echo $user1;
$validator = Validation::createValidatorBuilder()
    ->addMethodMapping('loadValidatorMetadata')
    ->getValidator();
$violations = $validator->validate($user1);
if (count($violations) > 0) 
{
    echo "This user is not valid!\n\n";
}
else 
{
    echo "User is valid!\n\n";
}

$user2 = new User(122, "Vika", "email", "123qwe!?");
echo($user2);
$validator = Validation::createValidatorBuilder()
    ->addMethodMapping('loadValidatorMetadata')
    ->getValidator();
$violations = $validator->validate($user2);
if (count($violations) > 0) 
{
    echo "This user is not valid!\n\n";
}
else 
{
    echo "User is valid!\n\n";
}

$user3 = new User(123, "123", "email@mail.ru", "123qwe!?");
echo $user3;
$validator = Validation::createValidatorBuilder()
    ->addMethodMapping('loadValidatorMetadata')
    ->getValidator();
$violations = $validator->validate($user3);
if (count($violations) > 0) 
{
    echo "This user is not valid!\n\n";
}
else 
{
    echo "User is valid!\n\n";
}

$user4 = new User(124, 12, "email@mail.ru", "?");
echo $user4;
$validator = Validation::createValidatorBuilder()
    ->addMethodMapping('loadValidatorMetadata')
    ->getValidator();
$violations = $validator->validate($user4);
if (count($violations) > 0) 
{
    echo "This user is not valid!\n\n";
}
else 
{
    echo "User is valid!\n\n";
}

$dateAndTime=new DateTime('2023-02-20');
$date=$dateAndTime->format('Y-m-d H:i:s');
$mass_comment = [   new Comment( $user1,"First comment!"),
                    new Comment( $user2, "Second comment."),
                    new Comment( $user3, "Last comment!"),
]; 
foreach ($mass_comment as $comment)
{
  if ($comment->user->getDateAndTime() > $date)
  {
    echo $comment->messege. "\n";
  }
}
