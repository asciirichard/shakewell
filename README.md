## Database
Type: sqlite <br>
File: /database/database.sqlite <br>
Tables:
- `users`
  - id
  - username
  - first_name
  - email
  - email_verified_at
  - password
  - remember_token
  - created_at
  - updated_at
- `vouchers`
  - id
  - code
  - user_id
  - created_at
  - updated_at

## Mail
- Email Engine: Mailtrap <br>
- Email Template from  https://postmarkapp.com/transactional-email-templates/welcome

## API Endpoints:

Header:
- `Accept: application/json`

1. `POST /api/user/register`
   * first_name
   * username (unique)
   * email (unique)
   * password
2. `POST /api/user/authenticate`
   * username 
   * password

Headers:
- `Accept: application/json`
- `Authentication: Bearer Token {token}`

3. `GET /api/voucher/generate`
4. `GET /api/user/logout`

## Postman
- Export file: Shakewell.postman_collection.json <br>
- Export type: Collection v2.1

## Additional packages installed
- Laravel Sanctum
