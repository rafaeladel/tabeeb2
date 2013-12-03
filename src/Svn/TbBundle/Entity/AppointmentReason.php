<?php
namespace Svn\TbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Svn\TbBundle\Repository\AppointmentReasonRepository")
 * @ORM\Table(name="reasons")
 */
class AppointmentReason
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    protected $reason;

    /**
     * @ORM\OneToMany(targetEntity="Appointment", mappedBy="reason")
     */
    protected $appointments;

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
     * Set reason
     *
     * @param string $reason
     * @return AppointmentReason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    
        return $this;
    }

    /**
     * Get reason
     *
     * @return string 
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->appointments = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add appointments
     *
     * @param \Svn\TbBundle\Entity\Appointment $appointments
     * @return AppointmentReason
     */
    public function addAppointment(\Svn\TbBundle\Entity\Appointment $appointments)
    {
        $this->appointments[] = $appointments;
    
        return $this;
    }

    /**
     * Remove appointments
     *
     * @param \Svn\TbBundle\Entity\Appointment $appointments
     */
    public function removeAppointment(\Svn\TbBundle\Entity\Appointment $appointments)
    {
        $this->appointments->removeElement($appointments);
    }

    /**
     * Get appointments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAppointments()
    {
        return $this->appointments;
    }
}