<img src="https://drive.google.com/uc?export=view&id=1WpfZJJS5LYut5ZbLoaJVD_lx1lO4k3zu" style="width: 300px; height: 500px" />

## Tripify

Tripify is a website that allows users to browse and book tours, as well as request their own custom tour trips.

## Prerequisites

- PHP >= 7.2.5
- Composer
- Xampp (A web server) 
- Ngrok (Proxy server)

## Features

- Browse and book tours
- Request custom tour trips
- User authentication and authorization
- Admin panel for managing tours and custom tour requests
- Payment integration

## Build With
- Laravel 8.0 - The PHP web framework used.
- Bootstrap 5.3 - Front-end framework
- LiveWire - Dynamic Front-end
- MidTrans - Payment integration

## Installing
1. Clone the repository to your local machine:
git clone https://github.com/NathalieWijaya/Tripify.git

2. Install dependencies:
composer install

3. Create a new database and configure your .env file (database name: tripify, MidTrans, Mailstrap, Google)

4. Run the migrations and seedings
php artisan migrate --seed

5. Start the development server:
php artisan serve

6. Run ngrok and make the server live:
ngrok
ngrok http {PORT}

7. Copy the forwarding link and login to Midtrans sanbox https://dashboard.sandbox.midtrans.com/login 

8. Go to Setting > Configuration and paste the forwarding link. Add "/api/callback" at the end. Lastly, scroll and click Update button.


## Authors

- Nathalie Wijaya
- Fransiscus Chandra
- Kevin Putra
- Billy Chandra



