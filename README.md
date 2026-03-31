# Foodable

Foodable is a PHP and MySQL web application focused on reducing food waste by connecting food contributors with charities and the public. The project includes role-based flows for charities, contributors, and public users, along with request handling and chat support.

## Features

- Multi-user login and signup
- Separate flows for `CHARITY`, `CONTRIBUTOR`, and `PUBLIC`
- Contributor and charity profile pages
- Request and acceptance workflow between contributors and charities
- Like system for charity and contributor connections
- Basic chat system backed by the `users` and `messages` tables
- Seeded demo data through `foodable.sql`

## Tech Stack

- PHP
- MySQL
- HTML, CSS, JavaScript

## Project Structure

- `index.php`: entry point, loads the login page
- `login.php`: role-based login flow
- `SignUp.php`: registration page
- `connection.php`: MySQL connection settings
- `charity/`: charity-facing pages
- `contributor/`: contributor-facing pages
- `public/`: public user pages
- `php/`: chat-related backend endpoints
- `foodable.sql`: database schema and sample data

## Local Setup

### 1. Clone the repository

```bash
git clone https://github.com/NijDave/Foodable.git
cd Foodable
```

### 2. Start MySQL

Make sure a local MySQL server is running.

### 3. Create and import the database

```bash
mysql -uroot -e "CREATE DATABASE IF NOT EXISTS foodable;"
mysql -uroot foodable < foodable.sql
```

If your MySQL root user has a password, use:

```bash
mysql -uroot -p -e "CREATE DATABASE IF NOT EXISTS foodable;"
mysql -uroot -p foodable < foodable.sql
```

### 4. Check database config

The app reads DB credentials from `connection.php`:

- host: `localhost`
- user: `root`
- password: empty string
- database: `foodable`

Update that file if your local MySQL setup uses different credentials.

### 5. Start the PHP server

From the project root:

```bash
php -S 127.0.0.1:8000
```

Then open:

```text
http://127.0.0.1:8000
```

## Demo Accounts

These sample accounts are available in `foodable.sql` after import.

### Charity

- Email: `info@icharity.in`
- Password: `123`

### Contributor

- Email: `mog@123`
- Password: `234`

### Public

- Email: `mayank@123`
- Password: `456`

## Database Tables

Main tables included in `foodable.sql`:

- `charity_master`
- `contributor_master`
- `public_master`
- `users`
- `messages`
- `charity_like`
- `charity_request_contributor`

## Notes

- Two large `.rar` files were excluded from GitHub push because they exceed GitHub's 100 MB file size limit.
- The repository still includes the extracted project assets and other media required by the app.
- The project uses plain PHP without a framework.

## Future Improvements

- Add password hashing
- Add input validation and prepared statements
- Add a proper router and configuration management
- Add installation instructions for MySQL on macOS and Windows
- Add screenshots and feature walkthroughs
