<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About the Project

This project is a simple Restful application built with the Laravel framework for managing consultants and scheduling appointments for clients. The application includes the following features:

- Create and list consultants (including displaying their appointments).
-  Register appointments by clients and list these appointments (shown in both the consultant's and client's lists).
- Create and list clients (with their appointments displayed in their list).
- Statistical features:
- - Number of appointments for each client and consultant.
- -  Number of clients for each consultant.

## Features

- Consultants Management: Allows the creation and listing of consultants along with their appointments.
- Clients Management: Enables the creation and listing of clients along with their appointments.
- Appointments Management: Allows clients to book appointments with consultants. Upon booking, both the client and the consultant receive an email notification.
- Statistics: Provides data on the number of appointments per client and consultant, and the number of clients per consultant.

## Project Structure

### Controllers
- ConsultantController: Manages CRUD operations for consultants.
- ClientController: Manages CRUD operations for clients.
- AppointmentController: Manages CRUD operations for appointments and sends email notifications upon booking.

### Requests

Form requests for validating inputs.

-  ConsultantRequest: Validates the data for creating a new consultant.
-  UpdateConsultantRequest: Validates the data for updating an existing consultant.
-  ClientRequest: Validates the data for creating a new client.
-  UpdateClientRequest: Validates the data for updating an existing client.
-  AppointmentRequest: Validates the data for creating a new appointment.
-  UpdateAppointmentRequest: Validates the data for updating an existing appointment.

### Models

- Consultant: Represents the consultants in the system.
- Client: Represents the clients in the system.
- Appointment: Represents the appointments between consultants and clients.

### Resources

- ConsultantResource: Formats the data for consultants when returning it in responses.
- ClientResource: Formats the data for clients when returning it in responses.
- AppointmentResource: Formats the data for appointments when returning it in responses.

### Mail

- AppointmentNotification: Handles the structure and content of the emails sent to consultants and clients when a new appointment is created.

# How to Use

### Adding a New Consultant

To add a new consultant, you would send a POST request to the endpoint managed by ConsultantController with the required data validated by StoreConsultantRequest.

### Updating an Existing Consultant
To update an existing consultant, you would send a PUT or PATCH request to the appropriate endpoint with the data validated by UpdateConsultantRequest.

### Listing All Consultants
To list all consultants along with their appointments, you would send a GET request to the endpoint managed by ConsultantController.

### Adding a New Client
To add a new client, you would send a POST request to the endpoint managed by ClientController with the required data validated by StoreClientRequest.

### Adding a New Appointment
To add a new appointment, you would send a POST request to the endpoint managed by AppointmentController with the required data validated by StoreAppointmentRequest. This action will also trigger the AppointmentNotification mail to be sent to both the consultant and the client.

## Configuration
- MAIL_MAILER=smtp
- MAIL_HOST=smtp.googlemail.com
- MAIL_PORT=587
- MAIL_USERNAME=your_email@gmail.com
- MAIL_PASSWORD=your_email_password
- MAIL_ENCRYPTION=tls
- MAIL_FROM_ADDRESS=your_email@gmail.com
- MAIL_FROM_NAME="Your App Name"

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
