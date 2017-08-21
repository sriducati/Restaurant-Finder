# Laravel Restaurant

Admin Panel:
- Able to manage restaurants with fields such as name,category, lat/lng
	-Create Restaurant
	-Update Restaurant
	-Delete Restaurant
	
![Alt text](/public/screenshot_admin.JPG?raw=true "Enter location to get Latitude and Longitude")

Visitor panel:
- Able to display restaurants location in google map(Plot markers on map)
- Able to detect current location and calculate distance from current location to restaurant, with turn by turn driving details using google api
- Responsive

![Alt text](/public/screenshot.JPG?raw=true "Find distance using from current location to restaurant using Laravel")

Additional Features Added:

- Register and login Admin.
- Error Handling.
- Display Notification.
- Store Login history On redis
- Fetch and display login history for user.

Note: - Please check test_restaurant.sql for current DB dump.

      -	Google map may not work on Chrome browser, If the site origin is not secured (Https).

# Setup

- composer update
- rename .env.example to .env
- php artisan key:generate
- php artisan serve

# Preinstall

- PHP7
- Mysql5.7
- Laravel 5.4
- Redis-server


any issues? mail me at srihost9@gmail.com or sriducati@gmail.com
