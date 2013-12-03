<?php
namespace Svn\TbBundle\Form;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReasonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $buidler, array $options)
    {
        $buidler
            ->add("reason", "text")
            ->add("submit", "submit");
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                "data_class" => 'Svn\TbBundle\Entity\AppointmentReason',
            )
        );
    }

    public function getName()
    {
        return "AppointmentReasonType";
    }

}
?>