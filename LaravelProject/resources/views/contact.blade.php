@extends('layout')

@section('content')
    <section class="contact">
        <div class="contact-header">
            <h1>Contact Us</h1>
            <p>We're here to help! Get in touch with us.</p>
        </div>

        <div class="contact-content">
            <div class="contact-form">
                <h2>Get in Touch</h2>
                <form action="" method="POST">
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

            <div class="contact-info">
                <h2>Our Location</h2>
                <p>Visit us at our office or get in touch via the contact form.</p>
                <div class="address">
                    <p><strong>Office Address:</strong> 123 Book Street, City Name, Country</p>
                    <p><strong>Phone:</strong> +1 234 567 890</p>
                    <p><strong>Email:</strong> <a href="mailto:info@onlinebookstore.com">info@onlinebookstore.com</a></p>
                </div>

                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=..." width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
