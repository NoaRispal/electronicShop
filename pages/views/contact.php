<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-12 text-center mb-2">
            <h1> Contact us </h1>
            <p> Something to ask ? Our team will answer it !</p>
        </div>
        <div class="col">
            <h5 class="text-center"> Visit us in one of our physical store ! </h5>
            <div class="card">
                <div class="card-body">
                    <!-- Interactive Map with Leaflet.js -->
                    <div id="map" style="height: 400px; width: 100%; border-radius: 10px;" class="shadow-sm mb-4"></div>
                    <!---->
                </div>
            </div>
        </div>
        <div class="col">
            <h5 class="text-center"> Ask your question directly ! </h5>
            <div class="card">
                <div class="card-body">
                    <!-- Form -->
                    <form id="contactForm">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="John Doe" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="john@example.com" required>
                        </div>
                        <div class="col-12">
                            <label for="subject" class="form-label">Subject</label>
                            <select id="subject" class="form-select">
                                <option selected>What is your Question</option>
                                <option>After-sales service</option>
                                <option>Claim</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="How can we help you ?" required></textarea>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Send</button>
                        </div>
                    </div>
                    </form>
                    <!---->
                </div>
            </div>
        </div>

    </div>
</div>
