<?php
namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vich\UploaderBundle\Form\Type\VichImageType;

class TaskController extends AbstractType
{
public function new(Request $request): Response
{
// creates a task object and initializes some data for this example
    $task = new Task();
    $task->setTask('Write a blog post');
    $task->setDueDate(new \DateTime('tomorrow'));

    $form = $this->createFormBuilder($task)
        ->add('test', VichImageType::class)
        ->add('dueDate', DateType::class)
        ->add('save', SubmitType::class, ['label' => 'Create Task'])
        ->getForm();

// ...
}
}