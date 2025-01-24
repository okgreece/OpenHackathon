# Open Hackathon

**Open Hackathon** is a management system application that helps organize and monitor hackathon competitions. Participants can track and manage their team through various features offered by the application. Users can submit requests to join a team, and team leaders have the ability to accept or reject these requests. Additionally, the application enables administrators to monitor the teams, their members, the stages of the competition, and maintain overall control of the competition process.

![image](https://github.com/user-attachments/assets/f67f39e7-bcf0-4873-8837-83688c5671ac)

## Technologies

This application is built using the following technologies:

- **PHP** with the **Laravel Framework** for the backend
- **Tailwind CSS** for styling
- **MySQL** for the database
- **JavaScript** for interactive elements

## Screenshots
![image](https://github.com/user-attachments/assets/b3a824fd-2457-4d21-9c1b-0785fc571313)
![image](https://github.com/user-attachments/assets/f8cd0250-2d66-4070-ba3c-b277a1cdb6aa)
![image](https://github.com/user-attachments/assets/9c827f5f-309d-4b0b-a80f-15623feb6060)


## Installation

Follow these steps to set up the project locally on your machine:

### 1. Clone the Repository

```bash
git clone https://github.com/georgekazz/OpenHackathon.git

composer install

npm install

cp .env.example .env

// Open the .env file and configure the following values according to your database:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=openhackathon
DB_USERNAME=root
DB_PASSWORD=

php artisan migrate

php artisan db:seed

php artisan key:generate

php artisan serve



