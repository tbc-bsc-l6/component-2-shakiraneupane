@extends('layout')

@section('title', 'Contact-us')

@section('content')
    <!-- Contact Section -->
    <section class="contact">

        <!-- Contact Header -->
        <div class="contact-header text-center mb-10">
            <h1 class="heading">Contact Us</h1>
            <p class="subheading">We're here to help! Get in touch with us.</p>
        </div>

        <div class="contact-content">

            <!-- Contact Form -->
            <div class="contact-form">
                <h2 class="form-heading">Get in Touch</h2>

                <!-- Contact Form Submission -->
                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf
                    <!-- Name Input -->
                    <div class="form-group">
                        <label for="name" class="label">Full Name</label>
                        <input type="text" id="name" name="name" required placeholder="Enter your name" class="input">
                    </div>

                    <!-- Email Input -->
                    <div class="form-group">
                        <label for="email" class="label">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email" class="input">
                    </div>

                    <!-- Message Textarea -->
                    <div class="form-group">
                        <label for="message" class="label">Message</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Enter your message" class="input"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>

            <!-- Weather Section -->
            <div class="weather-section">
                <!-- Weather Search Form -->
                <form method="GET" action="{{ url('/contact') }}" class="weather-form">
                    <label for="city" class="weather-label">Enter City:</label>
                    <input type="text" name="city" id="city" placeholder="Enter city" class="weather-input">
                    <button type="submit" class="search-btn">Search</button>
                </form>

                <!-- Display Weather Data -->
                @if(isset($weatherData))
                    <div class="weather-info">
                        <h2 class="weather-location">Weather in {{ $weatherData['name'] }}, {{ $weatherData['sys']['country'] }}</h2>
                        <p class="weather-detail"><strong>Condition:</strong> {{ $weatherData['weather'][0]['description'] }}</p>
                        <p class="weather-detail"><strong>Temperature:</strong> {{ $weatherData['main']['temp'] }} °C</p>
                        <p class="weather-detail"><strong>Wind Speed:</strong> {{ $weatherData['wind']['speed'] }} m/s</p>
                        <p class="weather-detail"><strong>Humidity:</strong> {{ $weatherData['main']['humidity'] }}%</p>
                    </div>
                @elseif(isset($error))
                    <!-- Error Message -->
                    <p class="error-message">{{ $error }}</p>
                @endif
            </div>

        </div>

        <!-- Contact Info Section -->
        <div class="contact-info">
            <h2 class="info-heading">Our Location</h2>
            <p class="info-subheading">Visit us at our office or get in touch via the contact form.</p>

            <!-- Address Details -->
            <div class="address">
                <p class="address-detail"><strong>123 Book Street, City Name, Country</strong></p>
                <p class="address-detail"><strong>+1 234 567 890</strong></p>
                <p class="address-detail">
                    <strong>
                        <a href="mailto:info@onlinebookstore.com" class="email-link">info@onlinebookstore.com</a>
                    </strong>
                </p>
            </div>
        </div>

    </section>
@endsection
