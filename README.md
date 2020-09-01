## Event Branding Application: Start to End Support

1. Website
2. Android Application

## Event Branding Application: Start to End Support (With Different Technology)

1. [Event Branding Application (Bootstrap4)](https://github.com/Vishal1107/EVENT_BRANDING_WEBSITE_FRONT_END)
2. Current Repository [Event Branding Application (PHP) ](https://github.com/Vishal1107/EVENT_BRANDING_APPLICATION)
3. [Event Branding Application (MERN)](https://github.com/Vishal1107/MERN_EVENT_BRANDING_APPLICATION)

## Event Branding Application: Start to End Support (Techfest Website)

Event Branding Application project is a mobile based application and website that supports User registration, Event registration, Event payment and checkouts, Event Certificate generation, Event certificate verification,
event feedback system and Administrator panel for events such as technical festival. It helps program attendees, organizers, the authors and the reviewers in their respective activities.

Development of Event Branding Application is an attempt to address the problems of managing registration forms. The main goal of this Website & Application is to give working solution to store, manage and consolidate the registration data.

Event Branding Application is mobile Application with Website for collecting registration forms automatically.

### Typical functions supported by Event Branding Application with Website (User Level)

- User registration with email notification.
- Event Registration with email notification and view event information.
- Payment and checkout.
- View event certificates after events.
- Verify Event certificate
- Feedback System.

### Typical functions supported by Event Branding Application with Website (Administrator Level)

1. **Administrator (College Level)**

- View/Add/Delete/Update Faculty Coordinator
- View and delete all event registration details.
- Send Newsletter to all Participant
- Send Emails to Participant college wise, department wise and Events wise
- View/Add/Delete/Update Events Details Information
- View/Add/Delete Gallery Images
- View/Add/Delete/Update Sponsor Information

2. **Faculty Coordinator (Department Level)**

- View/Add/Delete/Update Student Coordinator
- View and delete department level event registration details.
- Send Newsletter to all Participant
- Send Emails to Participant college wise, department wise and Events wise
- View/Add/ Delete/Update Events Details Information
- View/Add/Delete Gallery Images
- View/Add/Delete/Update Sponsor Information

3. **Student Coordinator (Event Level)**

- View and delete event level event registration details and Update it such as Prize.
- Send Newsletter to all Participant
- Send Emails to Participant college wise, department wise and Events wise
- View/Add/ Delete/Update Events Details Information
- View/Add/Delete Gallery Images
- View/Add/Delete/ Update Sponsor Information

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

## Technology Used

### Front-End

- Markup Language : HTML
- Stylesheet Language: CSS
- Scripting Language: Javascript
- Javascript Libraries: jQuery, SweetAlert.js, Wow.js, QRCode.js
- CSS Libraries: Animate.css, Font-Awesome.css, AOS Library
- CSS Framework: Bootstrap 4
- Other: Ajax

### Back-End

- Language: PHP
- PHP Libraries: PHP Mailer

### Database

- Database: MYSQL
- Query Language: SQL

### Designing Software FOR Certificate Images

- Software: CORELDRAW 11

### Version Control

- Software: GIT

### Payment Gateway

- PAYTM Payment Gateway API
