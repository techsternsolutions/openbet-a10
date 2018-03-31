<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Contact
 *
 * @ORM\Table(name="gcmdesktop_answer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GCMDesktopAnswerRepository")
 */
class GCMDesktopAnswer
{

    const RELEASE_PLAN_YES = 'yes';
    const RELEASE_PLAN_NO = 'no';
    const RELEASE_PLAN_UNDECIDED = 'undecided';

    const FILE_TYPE_SINGLE = 'single';
    const FILE_TYPE_SEPERATE = 'seperate';
    const FILE_TYPE_MIXED = 'mixed';
    const FILE_TYPE_UNDECIDED = 'undecided';

    const ENV_TYPE_FLASH = 'flash';
    const ENV_TYPE_HTML5 = 'html5';
    const ENV_TYPE_MIXED = 'mixed';
    const ENV_TYPE_UNDECIDED = 'undecided';

    const FLASH_SUPPORT_MAINTAIN = 'maintain';
    const FLASH_SUPPORT_DECOMMISION = 'decommision';
    const FLASH_SUPPORT_REPLACE = 'replace';
    const FLASH_SUPPORT_MIXED = 'mixed';
    const FLASH_SUPPORT_UNDECIDED = 'undecided';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="release_plan", type="string", length=255)
     * @Assert\NotBlank
     */
    private $releasePlan;

    /**
     * @var string
     *
     * @ORM\Column(name="file_type", type="string", length=255)
     * @Assert\NotBlank
     */
    private $fileType;

    /**
     * @var string
     *
     * @ORM\Column(name="env_type", type="string", length=255)
     * @Assert\NotBlank
     */
    private $envType;

    /**
     * @var string
     *
     * @ORM\Column(name="env_type_transition", type="string", length=255)
     * @Assert\NotBlank
     */
    private $envTypeTransition;

    /**
     * @var string
     *
     * @ORM\Column(name="flash_support", type="string", length=255)
     * @Assert\NotBlank
     */
    private $flashSupport;

    /**
     * @var string
     *
     * @ORM\Column(name="flash_support_transition", type="string", length=255)
     * @Assert\NotBlank
     */
    private $flashSupportTransition;

    /**
     * @var string
     *
     * @ORM\Column(name="html_titles_available", type="string", length=255)
     * @Assert\NotBlank
     */
    private $htmlTitlesAvailable;

    /**
     * @var string
     *
     * @ORM\Column(name="html_titles_planned", type="string", length=255)
     * @Assert\NotBlank
     */
    private $htmlTitlesPlanned;

    /**
     * @var string
     *
     * @ORM\Column(name="html_titles_transition", type="string", length=255)
     * @Assert\NotBlank
     */
    private $htmlTitlesTransition;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    private $notes;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     * @Assert\NotBlank
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255)
     * @Assert\NotBlank
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=255)
     * @Assert\NotBlank
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    public function __construct()
    {
        $this->submittedToHubspot = false;
    }


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
     * Set releasePlan
     *
     * @param string $releasePlan
     *
     * @return GCMDesktopAnswer
     */
    public function setReleasePlan($releasePlan)
    {
        $this->releasePlan = $releasePlan;

        return $this;
    }

    /**
     * Get releasePlan
     *
     * @return string
     */
    public function getReleasePlan()
    {
        return $this->releasePlan;
    }

    /**
     * Set fileType
     *
     * @param string $fileType
     *
     * @return GCMDesktopAnswer
     */
    public function setFileType($fileType)
    {
        $this->fileType = $fileType;

        return $this;
    }

    /**
     * Get fileType
     *
     * @return string
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * Set envType
     *
     * @param string $envType
     *
     * @return GCMDesktopAnswer
     */
    public function setEnvType($envType)
    {
        $this->envType = $envType;

        return $this;
    }

    /**
     * Get envType
     *
     * @return string
     */
    public function getEnvType()
    {
        return $this->envType;
    }

    /**
     * Set envTypeTransition
     *
     * @param string $envTypeTransition
     *
     * @return GCMDesktopAnswer
     */
    public function setEnvTypeTransition($envTypeTransition)
    {
        $this->envTypeTransition = $envTypeTransition;

        return $this;
    }

    /**
     * Get envTypeTransition
     *
     * @return string
     */
    public function getEnvTypeTransition()
    {
        return $this->envTypeTransition;
    }

    /**
     * Set flashSupport
     *
     * @param string $flashSupport
     *
     * @return GCMDesktopAnswer
     */
    public function setFlashSupport($flashSupport)
    {
        $this->flashSupport = $flashSupport;

        return $this;
    }

    /**
     * Get flashSupport
     *
     * @return string
     */
    public function getFlashSupport()
    {
        return $this->flashSupport;
    }

    /**
     * Set flashSupportTransition
     *
     * @param string $flashSupportTransition
     *
     * @return GCMDesktopAnswer
     */
    public function setFlashSupportTransition($flashSupportTransition)
    {
        $this->flashSupportTransition = $flashSupportTransition;

        return $this;
    }

    /**
     * Get flashSupportTransition
     *
     * @return string
     */
    public function getFlashSupportTransition()
    {
        return $this->flashSupportTransition;
    }

    /**
     * Set htmlTitlesAvailable
     *
     * @param string $htmlTitlesAvailable
     *
     * @return GCMDesktopAnswer
     */
    public function setHtmlTitlesAvailable($htmlTitlesAvailable)
    {
        $this->htmlTitlesAvailable = $htmlTitlesAvailable;

        return $this;
    }

    /**
     * Get htmlTitlesAvailable
     *
     * @return string
     */
    public function getHtmlTitlesAvailable()
    {
        return $this->htmlTitlesAvailable;
    }

    /**
     * Set htmlTitlesPlanned
     *
     * @param string $htmlTitlesPlanned
     *
     * @return GCMDesktopAnswer
     */
    public function setHtmlTitlesPlanned($htmlTitlesPlanned)
    {
        $this->htmlTitlesPlanned = $htmlTitlesPlanned;

        return $this;
    }

    /**
     * Get htmlTitlesPlanned
     *
     * @return string
     */
    public function getHtmlTitlesPlanned()
    {
        return $this->htmlTitlesPlanned;
    }

    /**
     * Set htmlTitlesTransition
     *
     * @param string $htmlTitlesTransition
     *
     * @return GCMDesktopAnswer
     */
    public function setHtmlTitlesTransition($htmlTitlesTransition)
    {
        $this->htmlTitlesTransition = $htmlTitlesTransition;

        return $this;
    }

    /**
     * Get htmlTitlesTransition
     *
     * @return string
     */
    public function getHtmlTitlesTransition()
    {
        return $this->htmlTitlesTransition;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return GCMDesktopAnswer
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return GCMDesktopAnswer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return GCMDesktopAnswer
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return GCMDesktopAnswer
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return GCMDesktopAnswer
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return GCMDesktopAnswer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return GCMDesktopAnswer
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public static function getReleasePlanChoices()
    {
        return array(
            self::RELEASE_PLAN_YES => 'Yes',
            self::RELEASE_PLAN_NO => 'No',
            self::RELEASE_PLAN_UNDECIDED => 'Undecided',
        );
    }

    public static function getFileTypeChoices()
    {
        return array(
            self::FILE_TYPE_SINGLE => 'Single file',
            self::FILE_TYPE_SEPERATE => ' Separate files',
            self::FILE_TYPE_MIXED => 'Mixed',
            self::FILE_TYPE_UNDECIDED => 'Undecided',
        );
    }

    public static function getEnvTypeChoices()
    {
        return array(
            self::ENV_TYPE_FLASH => 'Flash Only',
            self::ENV_TYPE_HTML5 => 'HTML5 Only',
            self::ENV_TYPE_MIXED => 'Mixed for foreseeable future',
            self::ENV_TYPE_UNDECIDED => 'Undecided',
        );
    }

    public static function getFlashSupportChoices()
    {
        return array(
            self::FLASH_SUPPORT_MAINTAIN => 'Support & maintain flash',
            self::FLASH_SUPPORT_DECOMMISION => 'Decommission flash games',
            self::FLASH_SUPPORT_REPLACE => 'Replace flash with HTML5 games',
            self::FLASH_SUPPORT_MIXED => 'Mixed by title',
            self::FLASH_SUPPORT_UNDECIDED => 'Undecided',
        );
    }

    public function getReleasePlanReadable()
    {
        $choices = self::getReleasePlanChoices();

        return $choices[$this->getReleasePlan()];
    }

    public function getFileTypeReadable()
    {
        $choices = self::getFileTypeChoices();

        return $choices[$this->getFileType()];
    }

    public function getEnvTypeReadable()
    {
        $choices = self::getEnvTypeChoices();

        return $choices[$this->getEnvType()];
    }

    public function getFlashSupportReadable()
    {
        $choices = self::getFlashSupportChoices();

        return $choices[$this->getFlashSupport()];
    }
}
