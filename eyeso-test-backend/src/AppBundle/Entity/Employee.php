<?php namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employee entity.
 *
 * @package     AppBundle
 * @copyright   Copyright (c) 2018 EYESO (https://eyeso.co)
 *
 * @ORM\Entity()
 * @ORM\Table(name="employees")
 * @ORM\HasLifecycleCallbacks
 */
class Employee {

    protected static $genderOptions = array(
        'eyeso.admissiontest.employee.male' => 'male',
        'eyeso.admissiontest.employee.female' => 'female',
    );

    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated;

    /**
    * @ORM\Column(type="string")
    */
    protected $name;

    /**
     * @ORM\Column(type="integer")
     */
    protected $age;

    /**
     * @ORM\Column(type="string")
     */
    protected $gender;

    /**
     * @ORM\ManyToOne(targetEntity="Job", inversedBy="employees")
     * @ORM\JoinColumn(name="job_id", referencedColumnName="id")
     */
    protected $job;

    /**
     * @ORM\PrePersist
     */
    public function prePersist() {
        $this->created = new \DateTime('now');
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate() {
        $this->updated = new \DateTime('now');
    }

    /**
     * Begin Getters/Setters
     */

    public function getId() {
        return $this->id;
    }

    public function getCreated() {
        return $this->created;
    }

    public function setCreated($created) {
        $this->created = $created;
    }

    public function getUpdated() {
        return $this->updated;
    }

    public function setUpdated($updated) {
        $this->updated = $updated;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getJob() {
        return $this->job;
    }

    public function setJob($job) {
        $this->job = $job;
    }

    /**
     * End Getters/Setters
     */

    /**
     * Returns the gender options
     *
     * @return array
     */
    public static function getGenderOptions($valuesOnly = true) {
        if($valuesOnly) {
            return array_values(self::$genderOptions);
        }

        return self::$genderOptions;
    }


}
