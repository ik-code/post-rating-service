## PHP Test Task - WordPress Ratings
* [Requirements](requirements.md)

##This is for windows users
- go to the post-rating-service folder
- run loragon.exe and start localhost laragon
- Laragon contains two websites:
- the first site - http://wp-post-rating.test with WP plugin ik-post-rating
- the second site (http://laravel-api-post-rating.test/ratings) is a laravel third-party service (endpoint - http://laravel-api-post-rating.test/api). This one stores data about Post Ratings  and send a response with average rating for  ​WP posts ( user can edit(CRUD) the rating data)