Database
- Type: sqlite
- File: /database/database.sqlite
- Tables:
  - users
    - id
    - username
    - first_name
    - email
    - email_verified_at
    - password
    - remember_token
    - created_at
    - updated_at
  - vouchers
    - id
    - code
    - user_id
    - created_at
    - updated_at

Database: /database/database.sqlite
Mailer: Mailtrap
Postman: postman.json

Email template grabbed from https://postmarkapp.com/transactional-email-templates/welcome

Additional packages installed
- Laravel Sanctum

API Endpoints:
- 
