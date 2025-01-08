@extends('layout')

@section('title', 'Contact-us')

@section('content')
    <section class="contact">
        <div class="contact-header">
            <h1>Contact Us</h1>
            <p>We're here to help! Get in touch with us.</p>
        </div>

        <div class="contact-content">
            <div class="contact-form">
                <h2>Get in Touch</h2>
                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Enter your message"></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>

            <div class="weather-section">
                <form method="GET" action="{{ url('/contact') }}">
                    <label for="city"><i class="fas fa-city"></i> Enter City:</label>
                    <input type="text" name="city" id="city" placeholder="Enter city" value="{{ request('city', 'Kathmandu') }}">
                    <button type="submit"><i class="fas fa-search"></i> Search</button>
                </form>

                @if(isset($weatherData))
                    <div class="weather-info">
                        <h2><i class="fas fa-cloud-sun"></i> Weather in {{ $weatherData['name'] }}, {{ $weatherData['sys']['country'] }}</h2>
                        <p><i class="fas fa-cloud"></i> <strong>Condition:</strong> {{ $weatherData['weather'][0]['description'] }}</p>
                        <p><i class="fas fa-thermometer-half"></i> <strong>Temperature:</strong> {{ $weatherData['main']['temp'] }} °C</p>
                        <p><i class="fas fa-wind"></i> <strong>Wind Speed:</strong> {{ $weatherData['wind']['speed'] }} m/s</p>
                        <p><i class="fas fa-tint"></i> <strong>Humidity:</strong> {{ $weatherData['main']['humidity'] }}%</p>
                    </div>
                @elseif(isset($error))
                    <p style="color: red;"><i class="fas fa-exclamation-circle"></i> {{ $error }}</p>
                @endif
            </div>
        </div>

        <div class="contact-info">
            <h2>Our Location</h2>
            <p>Visit us at our office or get in touch via the contact form.</p>
            <div class="address">
                <p><strong> 123 Book Street, City Name, Country</strong></p>
                <p><strong>+1 234 567 890</strong> </p>
                <p><strong> <a href="mailto:info@onlinebookstore.com">info@onlinebookstore.com</a></strong></p>
            </div>
        </div>
    </section>
@endsection
