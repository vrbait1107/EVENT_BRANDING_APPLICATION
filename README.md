## Event Branding Application: Start to End Support

1. Website
2. Android Application

## Event Branding Application: Start to End Support (With Different Technology)

1. Current Repository [Event Branding Application (PHP) ](https://github.com/vrbait1107/EVENT_BRANDING_APPLICATION)
2. [Event Branding Application (MERN)](https://github.com/vrbait1107/MERN_EBA) Under Development

## Event Branding Application: Start to End Support (Techfest + CulturalFest Website)

Event Branding Application project is a mobile based application and website that supports User registration, Event registration, Event payment and checkouts, Event Certificate generation, Event certificate verification,
event feedback system and Administrator panel for events such as technical festival and cultural festival. It helps program attendees, organizers, the authors and the reviewers in their respective activities.

Development of Event Branding Application is an attempt to address the problems of managing user registration, event registration & payment details also managing users certificates and verifying their certificates & users feedbacks. The main goal of this Website & Application is to give working solution to managing entire technical festival and cultural festival from start to end.

### Typical functions supported by Event Branding Application with Website (User Level)

- User registration with email notification.
- Event Registration with email notification and view event information.
- Payment and checkout.
- View event certificates after events.
- Verify Event certificate
- Feedback System.

### Typical functions supported by Event Branding Application with Website (Administrator Level)

1. **Administrator for Techfest (College Level)**

- View Event Revenue, Participant Count Statistics Charts.
- View registration details.
- View/Add/Delete/Update Faculty Coordinator.
- Send Newsletter to all Participant.
- View/Add/Delete/Update Sponsor Information.
- Send Emails to Participant college wise, department wise and Events wise.
- View/Add/Delete/Update Events Details Information.
- View/Add/Delete Gallery Images.
- View/Add/Delete/Update News/Notification Information.
- View/Delete Feedaback Information & View Feedback Statistics.

2. **Administrator for Cultural fest (College Level)**

- View Participant Count Statistics Charts.
- View registration details.
- View/Add/Delete/Update Events Details Information.
- View and delete event level event registration details and Update it such as Prize.

3. **Faculty Coordinator for Techfest (Department Level)**

- View Event Revenue, Participant Count Statistics Charts.
- View department level event registration details.
- View/Add/Delete/Update Student Coordinator.
- Send Newsletter to all Participant
- View/Add/Delete/Update Sponsor Information
- Send Emails to Participant college wise, department wise and Events wise
- View/Add/ Delete/Update Events Details Information
- View/Add/Delete Gallery Images
- View/Add/Delete/Update News/Notification Information
- View/Delete Feedaback Information & View Feedback Statistics.

4. **Student Coordinator for Techfest (Event Level)**

- View Event Revenue, Participant Count Statistics Charts
- View and delete event level event registration details and Update it such as Prize.
- Send Newsletter to all Participant
- View/Add/Delete/Update Sponsor Information
- Send Emails to Participant college wise, department wise and Events wise
- View/Add/ Delete/Update Events Details Information
- View/Add/Delete Gallery Images
- View/Add/Delete/Update News/Notification Information
- View/Delete Feedaback Information & View Feedback Statistics.

## Project Screenshots

- View Project Screenshots in pdf format. [View Screenshots](https://github.com/vrbait1107/EVENT_BRANDING_APPLICATION/blob/master/Project%20Screenshots/PROJECT%20SCREENSHOTS.pdf)

## PHP Mailer

- This project use PHP Mailer library for email purpose, So you must mention your email username and password in script, for more details and documentation of PHP Mailer library go to https://github.com/PHPMailer/PHPMailer
- Go to config folder folder
- Rename demo-Secret.php to Secret.php if not rename before.
- Open Secret.php file update the below constant values (API Keys)
  1.  emailUsername – Gmail Username
  2.  emailPassword - Gmail Password
  3.  emailSetFrom - Email Set From

## Google Recaptcha

- This Project use google recaptcha v2 Checkbox for security purpose.
- To use this functionality go to google recaptch Website https://www.google.com/recaptcha/intro/v3.html and Go to console and generate API Keys (data site key and secret Key).
- Go to config folder folder
- Rename demo-Secret.php to Secret.php if not rename before.
- Open Secret.php file update the below constant values (API Keys)
  1.  recaptchaSiteKey – Site Key Provided by Google Recaptcha Admin
  2.  recaptchaSecretKey - Secret Key Provided by Google Recaptcha Admin

## Database

1. We have used Mysql Database for this project.
2. Sql file available in Database folder.
3. For login Use below credentials.

**For Normal Users**

- Emails: From testuser01@gmail.com to testuser20@gmail.com
- Password: User@123 (For above 20 Emails.)

**For Administrator**

- Emails: Check Emails from admin_information table in sql file also check Roles of Admins (Shodh Administrator, Synergy Administrator, Faculty Coordinator and Student Coordinator)
- Password: Admin@123 (For All Administrators)

**NOTE:**

- We used PHP Mailer for this project & Above Emails are Fake used for test purpose only so phpmailer library cannot send email to above emails.
- We use dummy event registration so payment details for all event registration are same, Only Certificate Id's(Primary Key) and Event Fee are different.

## PAYTM Payment Gateway

- This project use Paytm Payment Gateway for online payment purpose go to this page for more details https://business.paytm.com/payment-gateway.
- To use paytm gateway functionality in this project please create Paytm Business account and generate API keys.
- Go to config folder folder
- Rename demo-Secret.php to Secret.php if not rename before.
- Open Secret.php file update the below constant values (API Keys)
  1.  merchantKey – Merchant Key Provided by Paytm
  2.  merchantMid - Merchant Id Provided by Paytm
  3.  merchantWeb - Merchant Website Provided by Paytm
- PaytmKit folder is having following files:

  1. TxnTest.php – Testing transaction through Paytm gateway.
  2. pgRedirect.php – This file has the logic of checksum generation and passing all required parameters to Paytm PG.
  3. pgResponse.php – This file has the logic for processing PG response after the transaction processing.
  4. TxnStatus.php – Testing Status Query API

  ### For Offline(Wallet Api) Checksum Utility below are the methods:

  - getChecksumFromString : For generating the checksum
  - verifychecksum_eFromStr : For verifing the checksum

  ### To generate refund checksum in PHP :

- Create an array with key value pair of following paytm parameters
  (MID, ORDERID, TXNTYPE, REFUNDAMOUNT, TXNID, REFID)
- To generate checksum, call the following method. This function returns the checksum as a string.
  getRefundChecksumFromArray($arrayList, $key, \$sort=1)

## License

Event Branding Application is [GNU GPL v3.0 licensed](./LICENSE).

## Contributing Guide

- Read our [Contributing Guide](./CONTRIBUTING.md) to learn about our development process, how to propose bugfixes and improvements, and how to build and test your changes to Event Branding Application.
- Please feel free to contribute in this project as well as other project in this account.

## Technology Used

### Front-End

- Markup Language : HTML
- Stylesheet Language: CSS
- Scripting Language: Javascript
- Javascript Libraries: jQuery, SweetAlert.js, QRCode.js
- CSS Libraries: Font-Awesome.css, AOS Animation Library.
- CSS Framework: Bootstrap 4
- Other: Ajax

### Back-End

- Language: PHP (PDO PHP with Prepared Statements)
- PHP Libraries: PHP Mailer

### Database

- Database: MYSQL
- Query Language: SQL

### Designing Software for Certificate Images

- Software: CORELDRAW 11

### Version Control

- Software: Git

### Payment Gateway

- PAYTM Payment Gateway API
