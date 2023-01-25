![Home Page](https://drive.google.com/uc?export=view&id=1GTgW9T8--7DzOtXlz4WVIBx4_yy5mmiO)
## Tripify

Tripify is a website that allows users to browse and book tours, as well as request their own custom tour trips.

## Prerequisites

- PHP >= 7.2.5
- Composer
- A web server (e.g. Apache, Nginx, Xampp) 
- Proxy server (e.g. Ngrok)

## Features

- Browse and book tours
- Request custom tour trips
- User authentication and authorization
- Admin panel for managing tours and custom tour requests
- Payment integration

## Build With
- Laravel - The PHP web framework used.
- Bootstrap - Front-end framework
- LiveWire - Dynamic Front-end
- MidTrans - Payment integration

## Installing
1. Clone the repository to your local machine:
git clone https://github.com/NathalieWijaya/Tripify.git

2. Install dependencies:
composer install

3. Copy the .env.example file to .env
cp .env.example .env

4. Generate an app encryption key:
php artisan key:generate

5. Create a new database and configure your .env file (database name: tripify)

6. Run the migrations and seedings
php artisan migrate --seed

7. Start the development server:
php artisan serve



## Authors

- Nathalie Wijaya
- Fransiscus Chandra
- Kevin Putra
- Billy Chandra



