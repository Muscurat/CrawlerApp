# CrawlerApp
Crawler Application is a simple crawler application (Console Application) allows to Crawl a paths of a given website using symfony framework and Spatie\Crawler Library.

# Before starting
1) First of all Download this console application and make it inside HTDOCS folder and run the XAMPP server.

2) the limited crawling number is 20 , and you can change this number from setMaximumCrawlCount() method inside CrawlerCommand.php class located on src/Crawler/Commands folder.

3) you should enter a valid website link for example : "https://www.linkedin.com"

# Use of CrawlerApp application
1) open the command line and go to CrawlerApp folder, after that run the symfony server using this command :             
php bin/console server:run

2) tap this command line to start the application : php bin/crawler start

3) after that it will shows you this message "Please enter a valid website link with 'https://' :" , so you should enter a valid website link with "https://" , and tap ENTER button.

4) and finally you can see the result in the command line in addition to that you can see it also inside a JSON file located on the main folder of CrawlerApp application named "crawler json result.json".
