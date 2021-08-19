## PHP Test Task - WordPress Ratings
* [Requirements](requirements.md)

##This is for windows users
- go to the post-rating-service folder
- run loragon.exe and start localhost laragon
- Laragon contains two websites:
- the first site - http://wp-post-rating.test with WP plugin ik-post-rating
- the second site (http://laravel-api-post-rating.test/ratings) is a laravel third-party service (endpoint - http://laravel-api-post-rating.test/api). This one stores data about Post Ratings  and send a response with average rating for  ​WP posts ( user can edit(CRUD) the rating data)
- PS: for the second site run composer install and add .env file:


APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:0W8PNU9M/YwUyMQqfJzGTPA+VzbwBvQCgP0Vh02IAzE=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel-api-post-rating
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

