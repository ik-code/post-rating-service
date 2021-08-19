The goal of this test is to create a small WordPress plugin and the third-party service. WordPress plugin should add rating dropdown to comments for posts. Data from this dropdown must be sent to independent service which stores all ratings from WordPress site.

## WordPress plugin

WordPress plugin should add rating stars to the comment form. Users can submit starts from 1 to 5 for the post by writing a comment. It’s up to you how you decide to make the rating input, it can be a simple dropdown with values 1 to 5 or more user friendly stars that are set by hovering them. When a user posts a comment, the plugin should send this rating with comment content and other needed data to third-party service via an API request. Third-party service must return the average rating for this post. The returned data must be saved as for this post.

##### Technical details
* The plugin must work with WordPress 5.7+
* Compatible with PHP 7.2+
* You must use WordPress API filters, hooks and functions
* Follow WordPress code style

## Third-party service
Third-party service stores all ratings for all posts from the WordPress site. It consists of a small API with an ability to add a new rating value for post and preview page(public) of all posts with an average rating.

## RESTful API
API must have only one API endpoint to allow adding rating records for the post. This request must work after RESTful principles. The request must contain post id, post title, user rating from comment. The API endpoint job is to add a new rating to a database, recount average rating for a post and send it as a reply to API requests. The response must be in JSON format.

## Preview Page
The preview page is an HTML page with an alphabetic list of all posts with average ratings on the third party service.

## Average rating formula
Use standard average rating formula(sum of rating points/count of rating records). No need to add any limitations about the number of rating records for valid average rating.

##### Technical details
* Laravel 8.* must be used as a framework for third-party service
* The database structure is on your own decision
* Follow Laravel PSR-12 coding standards

## Test package
We expect that after cloning your project we need to run commands like composer install and/or yarn install/build to get this plugin third party service running.
If some extra steps are needed we expect them to be described in the readme file.

## Branch Workflow
By working on this task please use the branch workflow. Try to make a commit every hour and after you have done the task, create a pull request.

## In conclusion
1. Before you start, reply when you are going to complete this test and how much time you're planning to spend on it.
2. Record the time that you spent while you were doing this task.
3. In a few words, describe which part of the task was the most difficult one, why? .

