<!DOCTYPE html>
<html>
<head>
    <title>Appointment Notification</title>
</head>
<body>
<h1>Appointment Scheduled</h1>
<p>Consultant: {{ $appointment->consultant->name }}</p>
<p>Client: {{ $appointment->client->name }}</p>
<p>Time
