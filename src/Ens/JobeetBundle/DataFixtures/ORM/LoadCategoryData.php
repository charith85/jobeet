<?php
/**
 * Created by PhpStorm.
 * User: C.MAHAWATTA
 * Date: 9/11/14
 * Time: 4:24 PM
 */

namespace Ens\JobeetBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ens\JobeetBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\DataFixtures\Doctrine\Common\Persistence\ObjectManager|\Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $design = new Category();
        $design->setName("Design");

        $programming = new Category();
        $programming->setName("Programming");

        $man = new Category();
        $man->setName("Manager");

        $administrator = new Category();
        $administrator->setName("Administrator");

        $manager->persist($design);
        $manager->persist($programming);
        $manager->persist($man);
        $manager->persist($administrator);

        $manager->flush();

        $this->addReference('category-design', $design);
        $this->addReference('category-programming', $programming);
        $this->addReference('category-manager', $manager);
        $this->addReference('category-administrator', $administrator);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 1;
    }
}