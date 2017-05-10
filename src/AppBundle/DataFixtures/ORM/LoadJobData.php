<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Job;

/**
 * Class LoadJobData
 * @package AppBundle\DataFixtures\ORM
 */
class LoadJobData implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $jobDescriptions = [
            'Clean desks on 2nd floor',
            'Monthly window cleaning',
            'Replace entrance doors',
            'Clean carpet in reception',
            'Replace boiler parts',
            'Move office equipment',
        ];

        foreach ($jobDescriptions as $jobDescription) {
            $job = new Job();
            $job->setDescription($jobDescription);

            $manager->persist($job);
        }

        $manager->flush();
    }
}