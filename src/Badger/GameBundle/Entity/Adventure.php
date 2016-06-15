<?php

namespace Badger\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Adventure
 *
 * @author    Marie Bochu <marie.bochu@akeneo.com>
 * @copyright 2016 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
class Adventure implements AdventureInterface
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $title;

    /** @var string */
    protected $description;

    /** @var int */
    protected $rewardPoint;

    /** @var bool */
    protected $isStepLinked;

    /** @var bool */
    protected $needProof;

    /** @var Badge */
    protected $badge;

    /** @var ArrayCollection */
    protected $steps;

    public function __construct()
    {
        $this->steps = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function setRewardPoint($rewardPoint)
    {
        $this->rewardPoint = $rewardPoint;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRewardPoint()
    {
        return $this->rewardPoint;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsStepLinked($isStepLinked)
    {
        $this->isStepLinked = $isStepLinked;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isStepLinked()
    {
        return $this->isStepLinked;
    }

    /**
     * {@inheritdoc}
     */
    public function needProof()
    {
        return $this->needProof;
    }

    /**
     * {@inheritdoc}
     */
    public function setNeedProof($needProof)
    {
        $this->needProof = $needProof;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setBadge(Badge $badge)
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * {@inheritdoc}
     */
    public function addStep(AdventureStepInterface $step)
    {
        $step->setAdventure($this);
        $this->steps[] = $step;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeStep(AdventureStepInterface $step)
    {
        $this->steps->removeElement($step);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setSteps($steps)
    {
        foreach ($steps as $step) {
            $this->addStep($step);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSteps()
    {
        return $this->steps;
    }
}
