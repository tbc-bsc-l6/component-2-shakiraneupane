@extends('layout')

@section('title', 'Contact-us')

@section('content')
    <section class="contact">
        <div class="contact-header text-center mb-10">
            <h1 class="text-4xl font-bold text-black mb-2">Contact Us</h1>
            <p class="text-xl text-gray-600">We're here to help! Get in touch with us.</p>
        </div>

        <div class="contact-content flex justify-between gap-12 flex-wrap ml-24">
            <div class="contact-form flex-1 bg-gray-100 p-8 rounded-lg shadow-md mb-12 max-w-md">
                <h2 class="text-3xl text-gray-800 font-semibold mb-5">Get in Touch</h2>
                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-5">
                        <label for="name" class="text-lg text-gray-600 block mb-2">Full Name</label>
                        <input type="text" id="name" name="name" required placeholder="Enter your name" class="w-full p-3 text-base rounded-lg border border-gray-300 mt-2 text-gray-800">
                    </div>
                    <div class="form-group mb-5">
                        <label for="email" class="text-lg text-gray-600 block mb-2">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email" class="w-full p-3 text-base rounded-lg border border-gray-300 mt-2 text-gray-800">
                    </div>
                    <div class="form-group mb-5">
                        <label for="message" class="text-lg text-gray-600 block mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Enter your message" class="w-full p-3 text-base rounded-lg border border-gray-300 mt-2 text-gray-800"></textarea>
                    </div>
                    <button type="submit" class="submit-btn bg-gray-800 text-white py-3 px-6 rounded-lg text-lg cursor-pointer transition duration-300 ease-in-out hover:bg-gray-900">Send Message</button>
                </form>
            </div>

            <!-- Weather Section -->
<div class="bg-gradient-to-b from-[#2e466e] to-[#1d2c47] text-white rounded-lg p-5 w-[400px] shadow-lg font-sans mx-auto h-[400px]">
    <form method="GET" action="{{ url('/contact') }}" class="flex flex-col gap-2">
        <label for="city" class="text-white"><i class="fas fa-city"></i> Enter City:</label>
        <input type="text" name="city" id="city" placeholder="Enter city" class="p-2 border border-gray-300 rounded-md outline-none mt-5 text-black">
        <button type="submit" class="p-3 bg-[#FF9913] border-none rounded-md text-white cursor-pointer hover:bg-[#FF6E00]">Search</button>
    </form>

    @if(isset($weatherData))
        <div class="mt-7 text-left">
            <h2 class="text-xl mb-5"><i class="fas fa-cloud-sun"></i> Weather in {{ $weatherData['name'] }}, {{ $weatherData['sys']['country'] }}</h2>
            <p class="my-2 mt-3"><i class="fas fa-cloud"></i> <strong class="text-[#f1c40f]">Condition:</strong> {{ $weatherData['weather'][0]['description'] }}</p>
            <p class="my-2"><i class="fas fa-thermometer-half"></i> <strong class="text-[#f1c40f]">Temperature:</strong> {{ $weatherData['main']['temp'] }} °C</p>
            <p class="my-2"><i class="fas fa-wind"></i> <strong class="text-[#f1c40f]">Wind Speed:</strong> {{ $weatherData['wind']['speed'] }} m/s</p>
            <p class="my-2"><i class="fas fa-tint"></i> <strong class="text-[#f1c40f]">Humidity:</strong> {{ $weatherData['main']['humidity'] }}%</p>
        </div>
    @elseif(isset($error))
        <p class="text-red-500"><i class="fas fa-exclamation-circle"></i> {{ $error }}</p>
    @endif
</div>

        </div>

        <div class="contact-info text-center">
            <h2 class="text-2xl font-bold text-blue-800 mb-5">Our Location</h2>
            <p class="text-xl text-gray-600 mb-5">Visit us at our office or get in touch via the contact form.</p>
            <div class="address">
                <p class="text-lg text-gray-700 mb-3"><strong>123 Book Street, City Name, Country</strong></p>
                <p class="text-lg text-gray-700 mb-3"><strong>+1 234 567 890</strong></p>
                <p class="text-lg text-gray-700"><strong><a href="mailto:info@onlinebookstore.com" class="text-blue-500 underline">info@onlinebookstore.com</a></strong></p>
            </div>
        </div>
    </section>
@endsection
