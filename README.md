# YouTube Video Downloader

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

## About

YouTube Video Downloader is a web application built on the Laravel framework that allows users to download YouTube videos by providing the video link.

## Features

- **Video Download**: Users can input a YouTube video link and download the video directly from the application.
- **Ease of Use**: Simple and intuitive interface for hassle-free video downloads.
- **Robust Backend**: Built on Laravel, ensuring stability, security, and scalability.

## How to Use

1. Clone the repository:

   ```bash
   git clone https://github.com/Tahirkhan7/Youtube-Downloader.git

2. Install dependencies:

   ```bash
   composer install

3. Set up your environment configuration by copying the .env.example file to .env:

    ```bash
   cp .env.example .env

4. Generate an application key:

   ```bash
   php artisan key:generate

5. Configure your database settings in the .env file

6. Run migrations:

    ```bash
   php artisan migrate

7. Start the development server:

    ```bash
   php artisan serve
