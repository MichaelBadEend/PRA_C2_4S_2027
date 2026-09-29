<!DOCTYPE html>
<html lang="en">
<head>
    <x-head/>
</head>
<body>

<x-navbar/>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-3">Neem contact met ons op</h1>
                <p class="text-muted mb-4">Heb je een vraag over een handleiding, een product of een bestelling? Vul het formulier in en wij reageren zo snel mogelijk.</p>
                <form action="" method="">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Voornaam</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Voornaam" required>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Achternaam</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Jouw achternaam" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mailadres</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="naam@example.com" required>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <label for="subject" class="form-label">Onderwerp</label>
                            <br>
                            <select class="form-select" id="subject" name="subject" required>
                                <option value="" selected disabled>Kies een onderwerp</option>
                                <option value="support">Support</option>
                                <option value="product">Productinformatie</option>
                                <option value="order">Bestelling</option>
                                <option value="other">Anders</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label">Bericht</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Schrijf hier je bericht..." required></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg mt-4">Verstuur bericht</button>
                </form>
        </div>
    </div>

</div>
<x-footer/>

</body>

</html>
