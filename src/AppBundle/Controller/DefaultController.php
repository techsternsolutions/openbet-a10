<?php

namespace AppBundle\Controller;

use AppBundle\BaseController;
use AppBundle\Entity\Contact;
use AppBundle\Entity\GCMDesktopAnswer;
use AppBundle\Form\ContactType;
use AppBundle\Form\GCMDesktopAnswerType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

use Akeneo\Component\SpreadsheetParser\SpreadsheetParser;

/**
 * Default controller for public area.
 */
class DefaultController extends BaseController
{
    const PAGE_TITLE = "One account. Contact us";
    const ENDPOINT = "https://forms.hubspot.com/uploads/form/v2/%s/%s";
    const SUCCESS_CODE = 204;

    /**
     * @param Request $request
     * @param $contact
     * @return bool
     */
    protected function submitHubspotForm(Request $request, Contact $contact, $formId = null, $pageTitle = null)
    {
        $name = explode(' ', $contact->getName(), 2);

        if (count($name) > 1) {
            $firstName = trim($name[0]);
            $lastName = trim($name[1]);
        } else {
            $firstName = trim($name[0]);
            $lastName = "";
        }

        $hsContextJson = json_encode([
            'hutk' => $request->cookies->get('hubspotutk'),
            'ipAddress' => $request->getClientIp(),
            'pageUrl' => $request->getPathInfo(),
            'pageName' => $pageTitle ? $pageTitle : $this::PAGE_TITLE,
        ]);

        $strPost = "firstname=".urlencode($firstName)
            ."&lastname=".urlencode($lastName)
            ."&job_title=".urlencode($contact->getJobTitle())
            ."&company=".urlencode($contact->getCompany())
            ."&email=".urlencode($contact->getEmail())
            ."&message=".urlencode($contact->getMessage())
            ."&hs_context=".urlencode($hsContextJson);

        $portalId = $this->container->getParameter("hub_id");
        $formGUID = $this->container->getParameter("form_guid");
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $strPost);
        curl_setopt($ch, CURLOPT_URL, sprintf($this::ENDPOINT, $portalId, $formGUID));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return ($statusCode == $this::SUCCESS_CODE);
    }

    /**
     * @Route("/grandnational/promo", name="grandnational_img")
     * @Method("GET")
     */
    public function staticEmailAction(Request $request)
    {
        return $this->render('default/grandimg.html.twig', []);
    }

    /**
     * @param Request $request
     * @Route("/staging/grandnational", name="grandnational")
     * @Route("/grandnational", name="grandnational2")
     * @Method("GET")
     */
    public function grandnationalAction(Request $request)
    {
        $form = $this->createForm(new ContactType(), null, [
            'action' => $this->generateUrl("contact_grandnational")
        ]);


        $filePath = $path = $this->get('kernel')->getRootDir().'/../web/grand/horse-table.xlsx';

        $workbook = SpreadsheetParser::open($filePath);
        $workSheet = $workbook->getWorksheetIndex(1);
        $workbookIterator = $workbook->createRowIterator($workSheet);
        $workbookIterator->rewind();
        $keys = $workbookIterator->current();
        $sheetData = [];

        foreach ($workbookIterator as $rowIndex => $values) {
            if ($rowIndex === 1) {
                continue;
            }

            $newRow = [];
            foreach ($values as $index => $value) {
                 $newRow[$keys[$index]] = $value;
            }

            $sheetData[$rowIndex] = $newRow;
        }

        return $this->render('default/grand.html.twig', [
            'contactForm' => $form->createView(),
            'horseTable' => array_values($sheetData),
            'stayTuned' => false,
        ]);
    }

    /**
     * @Route("/performance/contact", name="contact_grandnational")
     * @Route("/grandnational/contact")
     * @Route("/grandnationalperformance/contact")
     * @Method("POST")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactGrandAction(Request $request)
    {
        $form = $this->createForm(new ContactType());

        $form->handleRequest($request);
        $filePath = $path = $this->get('kernel')->getRootDir().'/../web/grand/horse-table.xlsx';

        $workbook = SpreadsheetParser::open($filePath);
        $workSheet = $workbook->getWorksheetIndex(1);
        $workbookIterator = $workbook->createRowIterator($workSheet);
        $workbookIterator->rewind();
        $keys = $workbookIterator->current();
        $sheetData = [];

        foreach ($workbookIterator as $rowIndex => $values) {
            if ($rowIndex === 1) {
                continue;
            }

            $newRow = [];
            foreach ($values as $index => $value) {
                 $newRow[$keys[$index]] = $value;
            }

            $sheetData[$rowIndex] = $newRow;
        }

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $contact = $form->getData();

            if ($this->submitHubspotForm($request, $contact, null, 'Performance. Contact Us.')) {
                $contact->setSubmittedToHubspot(true);
            }

            $em->persist($contact);
            $em->flush();

            return $this->render('default/grand.html.twig', [
                'contactForm' => $form->createView(),
                'horseTable' => array_values($sheetData),
                'thankyouMessage' => 'Thank you for contacting us'
            ]);
        } else {
            return $this->render('default/contact.html.twig', [
                'contactForm' => $form->createView(),
            ]);
        }
    }
    /**
     * @Route("/", name="homepage")
     * @Method("GET")
     */
    public function indexAction()
    {
        $form = $this->createForm(new ContactType(), null, [
            'action' => $this->generateUrl("contact")
        ]);

        return $this->render('default/index.html.twig', [
            'contactForm' => $form->createView()
        ]);
    }

	/**
	 * @Route("/grandnational", name="grandnational")
	 * @Method("GET")
	 */
	public function grandAction()
	{
		$form = $this->createForm(new ContactType(), null, [
			'action' => $this->generateUrl("contact")
		]);
		return $this->render('default/grand.html.twig', [
            'contactForm' => $form->createView(),
            'stayTuned' => false,
		]);
	}

    /**
     * @Route("/oneaccount/contact", name="contact")
     * @Route("/contact")
     * @Route("//contact")
     * @Method("POST")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(new ContactType());

        $form->handleRequest($request);
        $filePath = $path = $this->get('kernel')->getRootDir().'/../web/grand/horse-table.xlsx';

        $workbook = SpreadsheetParser::open($filePath);
        $workSheet = $workbook->getWorksheetIndex(1);
        $workbookIterator = $workbook->createRowIterator($workSheet);
        $workbookIterator->rewind();
        $keys = $workbookIterator->current();
        $sheetData = [];

        foreach ($workbookIterator as $rowIndex => $values) {
            if ($rowIndex === 1) {
                continue;
            }

            $newRow = [];
            foreach ($values as $index => $value) {
                 $newRow[$keys[$index]] = $value;
            }

            $sheetData[$rowIndex] = $newRow;
        }

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $contact = $form->getData();

            if ($this->submitHubspotForm($request, $contact)) {
                $contact->setSubmittedToHubspot(true);
            }

            $em->persist($contact);
            $em->flush();

            return $this->render('default/index.html.twig', [
                'contactForm' => $form->createView(),
                'thankyouMessage' => 'Thank you for contacting us'
            ]);
        } else {
            return $this->render('default/contact.html.twig', [
                'contactForm' => $form->createView(),
            ]);
        }
    }


    /**
     * @Route("//development/questionnaires/desktop_gcm", name="gcmdesktopAnswer")
     * @Route("/gcmdesktop", name="gcmdesktopAnswer_np")
     * @Method("POST")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function gcmdesktopAnswerAction(Request $request)
    {
        $form = $this->createForm(new GCMDesktopAnswerType());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $gcmDesktopAnswer = $form->getData();

            $em->persist($gcmDesktopAnswer);
            $em->flush();

            return $this->render('gcmdesktop/form.html.twig', [
                'form' => $form->createView(),
                'status' => 'success',
            ]);
        } else {
            return $this->render('gcmdesktop/form.html.twig', [
                'form' => $form->createView(),
                'status' => 'error',
            ]);
        }
    }

    /**
     * @Route("//development/questionnaires/desktop_gcm", name="gcmdesktop")
     * @Route("/gcmdesktop" )
     * @Method("GET")
     */
    public function gcmdesktopAction()
    {
        $form = $this->createForm(new GCMDesktopAnswerType(), null, [
            'action' => $this->generateUrl("gcmdesktopAnswer")
        ]);

        return $this->render('gcmdesktop/form.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/admin/gcmdesktop", name="gcmdesktop_admin")
     * @Method("GET")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adminGCMDesktopAction(Request $request)
    {
        $answers = $this->getDoctrine()->getManager()->getRepository('AppBundle:GCMDesktopAnswer')->getAll();

        $answers->setMaxPerPage(50);
        $answers->setCurrentPage($request->get('page', 1));

        return $this->render('admin/gcmdesktop.html.twig', [
            'answers' => $answers,
        ]);
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/admin/gcmdesktop/export", name="gcmdesktop_admin_export")
     * @Method("GET")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adminGCMDesktopExportAction(Request $request)
    {
        $answers = $this->getDoctrine()->getManager()->getRepository('AppBundle:GCMDesktopAnswer')->getAll();

        $csv = $this->array2csv(array(
            'ID',
            'Name',
            'Last name',
            'Company',
            'Position',
            'E-mail',
            'Release Plan',
            'File Type',
            'Environment Type',
            'Environment Type Timeline',
            'Flash Support',
            'Flash Support Timeline',
            'Titles available',
            'Titles planned',
            'Titles timeline',
            'Notes',
            'Date'
        ));

        foreach ($answers as $answer) {
            $csv .= $this->array2csv(array(
                $answer->getId(),
                $answer->getName(),
                $answer->getLastname(),
                $answer->getCompany(),
                $answer->getPosition(),
                $answer->getEmail(),
                $answer->getReleasePlanReadable(),
                $answer->getFileTypeReadable(),
                $answer->getEnvTypeReadable(),
                $answer->getEnvTypeTransition(),
                $answer->getFlashSupportReadable(),
                $answer->getFlashSupportTransition(),
                $answer->getHtmlTitlesAvailable(),
                $answer->getHtmlTitlesPlanned(),
                $answer->getHtmlTitlesTransition(),
                $answer->getNotes(),
                $answer->getCreatedAt()->format('Y-m-d')
            ));
        }

        return new Response($csv, 200, array(
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . sprintf('gcmdesktop-%s.csv', date('Ymd-His')) . '"',
        ));
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/admin/gcmdesktop/show/{id}", name="gcmdesktop_admin_show")
     * @Method("GET")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adminGCMDesktopShowAction(Request $request, $id)
    {
        return $this->render('admin/gcmdesktop_show.html.twig', [
            'answer' => $this->getAnswerOr404($id),
        ]);
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/admin/gcmdesktop/delete/{id}", name="gcmdesktop_admin_delete")
     * @Method("GET")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adminGCMDesktopDeleteAction(Request $request, $id)
    {
        $gcmDesktopAnswer = $this->getAnswerOr404($id);

        $em = $this->getDoctrine()->getManager();

        $em->remove($gcmDesktopAnswer);
        $em->flush();

        return $this->redirectToRoute('gcmdesktop_admin');
    }

    private function array2csv($values)
    {
        $values = array_map(
            function($str) {
                if (strpos($str, '"') === false && strpos($str, ',') === false) {
                    return $str;
                } else {
                    return '"' . str_replace('"', '""', $str) . '"';
                }
            },
            $values
        );

        return implode(',', $values) . "\n";
    }

    private function getAnswerOr404($id)
    {
        $gcmDesktopAnswer = $this->getDoctrine()->getManager()->getRepository('AppBundle:GCMDesktopAnswer')->findOneById($id);

        if (!$gcmDesktopAnswer instanceof GCMDesktopAnswer) {
            throw new NotFoundHttpException('The answer is not found');
        }

        return $gcmDesktopAnswer;
    }
}
