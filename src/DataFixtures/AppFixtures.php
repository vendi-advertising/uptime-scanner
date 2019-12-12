<?php

namespace App\DataFixtures;

use App\Entity\DnsEntry;
use App\Entity\Domain;
use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $rootEntry = DnsEntry::create('@');
        $wwwEntry = DnsEntry::create('www');

        $vendiDomain = new Domain();
        $vendiDomain->setName('vendiadvertising.com');

        $vendiDomain->addDnsEntry($rootEntry);
        $vendiDomain->addDnsEntry($wwwEntry);

        $vendiProperty = new Property();
        $vendiProperty->setName('Vendi Website');

        $vendiProperty->addDomain($vendiDomain);

        $manager->persist($rootEntry);
        $manager->persist($wwwEntry);
        $manager->persist($vendiProperty);
        $manager->persist($vendiDomain);

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
