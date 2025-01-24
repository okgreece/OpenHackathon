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
```

### 2. Install PHP dependencies
```bash
composer install
```

### 3. Install Javascript dependencies
```bash
npm install
```

### 4. Create a configuration file
```bash
cp .env.example .env
```

### 5. Create a database on your database server and keep notes of the connection parameters

### 6. Open the .env file and configure the following values according to your database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=openhackathon
DB_USERNAME=root
DB_PASSWORD=
```
### 6. Run database migration to create the schema
```bash
php artisan migrate
```

### 7. Initialize the database with required data
```bash   
php artisan db:seed
```

### 8. Generate encryprion key
```bash
php artisan key:generate
```

### 7. Serve the application and head to your browser
```bash
php artisan serve
```


