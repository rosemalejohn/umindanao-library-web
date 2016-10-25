<?php

use App\College;
use App\Resource;
use App\User;
use App\Visitor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        Visitor::create([
            'firstname' => 'Rosemale-John II',
            'middlename' => 'Cartin',
            'lastname' => 'Villacorta',
            'email' => 'rosemalejohn@gmail.com',
            'password' => bcrypt('rosemalejohn'),
            'id_number' => 111231,
            'type' => 'student',
        ]);

        Visitor::create([
            'firstname' => 'Riena Mae',
            'middlename' => 'Loffe',
            'lastname' => 'Cabial',
            'email' => 'rienamae@gmail.com',
            'password' => bcrypt('rienamae'),
            'id_number' => 111232,
            'type' => 'faculty',
        ]);

        College::create([
            'name' => 'Law, Graduate and Post-Graduate programs',
        ]);

        College::create([
            'name' => 'College of Accounting Education',
        ]);

        College::create([
            'name' => 'College of Architecture and Fine Arts Education',
        ]);

        College::create([
            'name' => 'College of Business Administration Education',
        ]);

        College::create([
            'name' => 'College of Computing Education',
        ]);

        College::create([
            'name' => 'College of Hospitality Education',
        ]);

        College::create([
            'name' => 'College of Criminal Justice Education',
        ]);

        College::create([
            'name' => 'College of Teacher Education',
        ]);

        College::create([
            'name' => 'College of Engineering Education',
        ]);

        College::create([
            'name' => 'College of Arts and Sciences Education',
        ]);

        College::create([
            'name' => 'College of Health Sciences Education',
        ]);

        Resource::create([
            'name' => 'UM-LIC Portal',
            'details' => "The information professionals at your library have invested in databases designed to end your searches with high-quality, relevant content to help you make the grade. Student-tested and professor approved. These sources support typical course content and assignments at your school. And they're online for you to access from anywhere on or offcampus, any time of day or night, absolutely free.",
            'photo' => null,
            'url' => 'https://sites.google.com/site/uminfocenter/home',
        ]);

        Resource::create([
            'name' => 'E-Brary',
            'details' => "eBrary has been building and fine tuning Academic Complete for over a decade based on Librarians input and ongoing support. Academic Complete is the most cost-effective way to suffer students, researchers, and faculty both breadth and depth of scholarly e-books in all subject areas.",
            'photo' => null,
            'url' => 'http://umlicmonitoring.hol.es/site.ebrary.com/lib/uniofmindanao/home.action',
        ]);

        Resource::create([
            'name' => 'PROQUEST',
            'details' => "PROQUEST 2000 Special Collection (PQ5000 SC) is one of the most comprehensive online specials databases available today. It provides access to over 14, 190 titles with over 10,720 available in full text. Together, there titles constitute a complete core collection of journals and periodicals in all key academic areas to provide departments in your institution with the information they need. \n\nUse these credentials to log in, User:33h3wsp28s Password:welcome",
            'photo' => null,
            'url' => 'http://search.proquest.com/',
        ]);

        Resource::create([
            'name' => 'INFOTRAC',
            'details' => "InfoTrac College Edition, an Online Research and Learning Center, offers over 20 million full-text articles from nearly 6,000 scholarly and popular periodicals. Articles over a broad spectrum of disciplines and topics - ideal for every type of researcher. Professors and students can gain access to the online database 24/7 on any computer with internet access.",
            'photo' => null,
            'url' => 'http://infotrac.galegroup.com/itweb/mindanao',
        ]);

        Resource::create([
            'name' => 'Philippine E-Journals',
            'details' => "The Philippine E-journals is an expanding collection of academic journals that are made accessible globally through a single web-based platform. It is hosted by CE Publishing Inc., a premier educational publisher in the Philippines and a leader in the distribution of integrated information-based solutions which include e-learning products, library automation and interactive media systems, and online library automation and interactive media systems, and online library resources containing databases, e-books and online journals.",
            'photo' => null,
            'url' => 'http://ejournals.ph/',
        ]);
    }
}
