<?php

namespace Svn\TbBundle\Controller;

use Svn\TbBundle\Entity\Appointment;
use Svn\TbBundle\Entity\AppointmentReason;
use Svn\TbBundle\Form\AppointmentType;
use Svn\TbBundle\Form\ReasonType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SvnTbBundle:Default:index.html.twig');
    }

    /**
     * @TODO: CSRF
     */
    public function getBookingAction()
    {
//        $csrf = $this->get("form.csrf_provider");
//        $token = $csrf->generateCsrfToken("");
        $appointment = new Appointment();
        $appointment_form = $this->createForm(new AppointmentType(), $appointment);
        return $this->render('SvnTbBundle:Default:booking.html.twig', array(
            "appointment_form" => $appointment_form->createView(),
        ));
    }

    public function postBookingAction(Request $request)
    {
        if(!$this->get("security.context")->isGranted("ROLE_USER"))
        {
            return $this->redirect($this->generateUrl("fos_user_security_login"));
        }
        $appointment = new Appointment();
        $appointment_form = $this->createForm(new AppointmentType(), $appointment);
        $appointment_form->handleRequest($request);
        if($appointment_form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($appointment);
            $em->flush();
            return $this->redirect($this->generateUrl("svn_tb_get_booking_finish", array("id" => $appointment->getId())));
        }
        return $this->render('SvnTbBundle:Default:booking.html.twig', array(
            "appointment_form" => $appointment_form->createView(),
        ));

    }

    public function getAddReasonAction()
    {
        $reason = new AppointmentReason();
        $reason_form = $this->createForm(new ReasonType(), $reason);
        return $this->render("SvnTbBundle:Default:reason.html.twig", array(
            "reason_form" => $reason_form->createView(),
        ));
    }

    public function postAddReasonAction(Request $request)
    {
        $reason = new AppointmentReason();
        $reason_form = $this->createForm(new ReasonType(), $reason);
        $reason_form->handleRequest($request);
        if($reason_form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reason);
            $em->flush();
            return $this->redirect($this->generateUrl("svn_tb_get_booking"));
        }
        return $this->render("SvnTbBundle:Default:reason.html.twig", array(
            "reason_form" => $reason_form->createView(),
        ));
    }

    public function getBookingFinishAction($id)
    {
        $appointment = $this->getDoctrine()->getRepository("SvnTbBundle:Appointment")->findOneById($id);
        if(!$appointment)
        {
            throw $this->createNotFoundException("Appointment Not found");
        }
        return $this->render("SvnTbBundle:Default:booking_finish.html.twig", array(
            "appointment" => $appointment,
        ));
    }
}
