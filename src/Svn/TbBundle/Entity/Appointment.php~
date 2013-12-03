<?php
namespace Svn\TbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Svn\TbBundle\Repository\AppointmentRepository")
 * @ORM\Table(name="appointments")
 * @Assert\GroupSequence({"Form", "Appointment"})
 */
class Appointment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime(groups={"Form"})
     */
    protected $date;

    /**
     * @ORM\ManyToOne(targetEntity="AppointmentReason", inversedBy="appointments")
     * @Assert\NotBlank(groups={"Form"})
     */
    protected $reason;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(groups={"Form"})
     */
    protected $description;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Appointment
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Appointment
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set reason
     *
     * @param \Svn\TbBundle\Entity\AppointmentReason $reason
     * @return Appointment
     */
    public function setReason(\Svn\TbBundle\Entity\AppointmentReason $reason = null)
    {
        $this->reason = $reason;
    
        return $this;
    }

    /**
     * Get reason
     *
     * @return \Svn\TbBundle\Entity\AppointmentReason 
     */
    public function getReason()
    {
        return $this->reason;
    }
}