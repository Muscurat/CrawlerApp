<?php

namespace App\Crawler\Commands;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Question\Question;
use Spatie\Crawler\Crawler;
use App\Crawler\Algorithms\CrawlObserverChild; 

class CrawlerCommand extends Command
{
    protected function configure()
    {
        $this->setName('start')
             ->setDescription('crawler start command')
             ->setHelp('Crawl the websites using symfony created by ELAMINE BACHIR.');
             //->addArgument('testValue', InputArgument::REQUIRED, 'Pass a test value.');
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        // *** get the website link from the command line ****
        $question = new Question('Please enter a valid website link with "https://" : ', 'WebSiteLink');
        $helper = $this->getHelper('question');
        $websitelink = $helper->ask($input, $output, $question);

        // ***** crawling functionality *****
        Crawler::create()
            ->setCrawlObserver(new CrawlObserverChild())
            ->setMaximumCrawlCount(20)
            ->ignoreRobots()
            ->startCrawling($websitelink.'');
            //->startCrawling('https://www.emploitic.com');

        //$output->writeln(sprintf('Hello World!, %s', $websitelink));    
        //$output->writeln(sprintf('Hello World!, %s', $input->getArgument('testValue')));    


    }
 
}
