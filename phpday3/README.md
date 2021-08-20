Description : Mobile inventory app allows users to store their details like name, email and mobile number.
It also has other functions like fetching/deleting user data by their username/email/mobile.

API routes for Mobile inventory

GET /contact 
GET /contact/?name={name}
GET /contact/?email={email}
GET /contact/?mobile={mobile}
POST /contact   {"name","email","mobile"}
DELETE /contact/byName  {"name"}
DELETE /contact/byEmail   {"email"}
DELETE /contact/byMobile    {"mobile"}
