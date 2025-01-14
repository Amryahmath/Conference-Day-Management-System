# Conference Day Management

## Overview
Conference Day Management is a web application designed to streamline the management of conference events. Built using **JavaScript**, **HTML**, **CSS**, and **PHP**, this application facilitates various functionalities aimed at enhancing the experience for both organizers and attendees.

## Features Implemented
- **QR Registration**: Attendees can register for the conference using QR codes, simplifying the check-in process.
- **Attendance Scanning System**: Implemented a real-time attendance system where organizers can scan attendee QR codes to track attendance.
- **Dynamic User Interface**: The application features a responsive and dynamic UI that adapts to different devices, ensuring a seamless user experience.

## How to Set Up and Run the Application

### Prerequisites
- Ensure you have the following installed:
  - A web server (e.g., Apache, Nginx)
  - PHP (version 7.0 or higher)
  - MySQL or any compatible database

### Setup Instructions
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/Amryahmath/conference-day-management.git
   cd conference-day-management
   ```

2. **Setup Database**:
   - Create a new database in your MySQL server.
   - Import the database schema from `database.sql` provided in the repository.

3. **Configure Environment**:
   - Rename `config.sample.php` to `config.php`.
   - Update the database credentials in `config.php` with your database details.

4. **Start the Web Server**:
   - If using Apache, ensure that the server is running and configured to serve your project directory.
   - Access the application via your web browser at `http://localhost/conference-day-management`.

5. **Access the Application**:
   - Open your web browser and navigate to `http://localhost/conference-day-management`.
   - You should see the home page of the Conference Day Management application.


username: amry
password: 123456789

## Conclusion
This README provides a comprehensive guide for setting up and running the Conference Day Management application. The implemented features aim to enhance user engagement and streamline event management processes. For any issues or contributions, feel free to open an issue or submit a pull request.

