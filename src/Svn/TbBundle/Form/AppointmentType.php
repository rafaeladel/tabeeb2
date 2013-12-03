<?php
namespace Svn\TbBundle\Form;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AppointmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $buidler, array $options)
    {
        $buidler
            ->add("date", "datetime", array("widget" => "single_text"))
            ->add("reason", "entity", array('class' => "SvnTbBundle:AppointmentReason", "property" => "reason" ))
            ->add("description", "textarea")
            ->add("Continue", "submit");
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                "data_class" => 'Svn\TbBundle\Entity\Appointment',
                "validation_group" => "Form",
            )
        );
    }

    public function getName()
    {
        return "AppointmentType";
    }

}
?>