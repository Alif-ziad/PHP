# PHP Practice & Database Exercises

Small PHP coursework exercises covering form handling, validation, file uploads, basic calculations, and MySQL access.

## Included work

- **Student Registration Form** — field validation for name, email, username, password, age, gender and course.
- **PHP Calculator** — simple arithmetic using submitted form values.
- **Contact Form** — validation plus JPEG/PNG/PDF upload practice with a 2 MB limit.
- **Registration Exercise** — username/email/password validation practice.
- **Bookstore Exercise** — local MySQL connection and partial add-book/ISBN checking work.
- **Student Records** — local MySQL connection and tabular student-record display.

## Structure

```text
Database/
├── Bookstore/
└── Studentrecords/

php/
├── Student Registration Form/
├── php-calculator/
├── php-contact-form/
└── php-registration/
```

## Run locally

Use PHP directly or a local stack such as XAMPP/WAMP/LAMP. For database exercises, start MySQL and create the database/schema expected by the relevant connection file before opening the page through `localhost`.

## Notes

- The database examples use local development credentials (`root` with no password) and are **not production configuration**.
- The bookstore folder is incomplete: `catalog.php`, `details.php` and `search.php` are empty placeholders, and the add-book routine is unfinished.
- `php-contact-form/uploads/` contains historical sample uploads; new runtime uploads are ignored by `.gitignore`.
- These exercises are learning/coursework examples rather than production applications.

## Tech

PHP · MySQL · HTML · basic CSS/form validation

## Maintainer

**MD Alif Ziad Sarkar**
