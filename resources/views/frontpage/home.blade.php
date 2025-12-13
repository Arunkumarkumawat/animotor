@extends('frontpage.layout_home')

@section('content')
<livewire:booking />

<main>
    <section class="section">
        <div class="container">
            <h2>Explore our services</h2>
            <p class="sub">
                From short-term car rentals for holidays to long-term private hire vehicles for professionals,
                and luxurious chauffeur services for executive travel.
            </p>
            <div class="cards">
                <div class="card">
                    <div class="top">
                        <div class="iconWrap">
                            <svg style="color:var(--brand)"><use href="#i-car"/></svg>
                        </div>
                        <span class="pill">Standard Hire</span>
                    </div>
                    <h3>Standard Car Hire</h3>
                    <p>Rent cars for personal travel, business trips, or holidays. Compare prices and models from various trusted partners worldwide.</p>
                    <a href="#" class="cta-link">
                        View Car Hire <svg><use href="#i-arrow"/></svg>
                    </a>
                </div>
                <div class="card">
                    <div class="top">
                        <div class="iconWrap orange">
                            <svg style="color:var(--warn)"><use href="#i-briefcase"/></svg>
                        </div>
                        <span class="pill pco">PHV/PCO</span>
                    </div>
                    <h3>Private Hire Vehicles</h3>
                    <p>Long-term rental solutions tailored for licensed PHV/PCO drivers. Access vehicles that meet regulatory standards effortlessly.</p>
                    <a href="{{ route('private_hire_list') }}" class="cta-link">
                        Find PHV/PCO Deals <svg><use href="#i-arrow"/></svg>
                    </a>
                </div>
                <div class="card">
                    <div class="top">
                        <div class="iconWrap cyan">
                            <svg style="color:var(--brand2)"><use href="#i-crown"/></svg>
                        </div>
                        <span class="pill premium">Executive</span>
                    </div>
                    <h3>Executive Chauffeur</h3>
                    <p>Book premium chauffeur-driven services for corporate events, airport transfers, or luxury personal travel. Vehicles and drivers meet top standards.</p>
                    <a href="{{ route('frontpage.chauffeur.search') }}" class="cta-link">
                        Request Chauffeur <svg><use href="#i-arrow"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section anchor" id="how">
        <div class="container">
            <h2>How ANI Motors works in 3 easy steps</h2>
            <p class="sub">We simplify the process of finding and booking your ideal vehicle, ensuring clarity and transparency every step of the way.</p>
            <div class="steps">
                <div class="step">
                    <div class="n">1</div>
                    <h3>Search & Compare</h3>
                    <p>Enter your location and dates. Our marketplace instantly compares vetted offers across multiple suppliers and vehicle types.</p>
                    <div class="mini">
                        <svg><use href="#i-search"/></svg> Quick, comprehensive results
                    </div>
                </div>
                <div class="step">
                    <div class="n">2</div>
                    <h3>Select & Book</h3>
                    <p>Review the results, check transparent prices and supplier ratings. Select the best deal and proceed to secure your reservation.</p>
                    <div class="mini">
                        <svg><use href="#i-money"/></svg> Transparent pricing
                    </div>
                </div>
                <div class="step">
                    <div class="n">3</div>
                    <h3>Confirm & Drive</h3>
                    <p>Receive immediate confirmation and details from the supplier. Your vehicle is ready for pickup on your chosen date.</p>
                    <div class="mini">
                        <svg><use href="#i-car"/></svg> Ready when you are
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2>Why trust ANI Motors?</h2>
            <p class="sub">We are committed to providing a reliable, safe, and transparent booking experience by vetting our partners thoroughly.</p>
            <div class="trust-grid">
                <div class="trust">
                    <div class="ico">
                        <svg style="color:var(--good)"><use href="#i-check"/></svg>
                    </div>
                    <div>
                        <h4>Vetted Suppliers</h4>
                        <p>Every partner is checked for licensing, fleet quality, and service history.</p>
                    </div>
                </div>
                <div class="trust">
                    <div class="ico blue">
                        <svg style="color:var(--brand)"><use href="#i-shield"/></svg>
                    </div>
                    <div>
                        <h4>Secure Payments</h4>
                        <p>All transactions are processed securely using industry-standard encryption.</p>
                    </div>
                </div>
                <div class="trust">
                    <div class="ico orange">
                        <svg style="color:var(--warn)"><use href="#i-briefcase"/></svg>
                    </div>
                    <div>
                        <h4>PHV Compliance</h4>
                        <p>Dedicated search for PCO/PHV drivers ensures vehicles meet all required standards.</p>
                    </div>
                </div>
                <div class="trust">
                    <div class="ico cyan">
                        <svg style="color:var(--brand2)"><use href="#i-headset"/></svg>
                    </div>
                    <div>
                        <h4>Dedicated Support</h4>
                        <p>Our team is available 24/7 to assist with any booking or service queries.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section anchor" id="offers">
        <div class="container">
            <h2>Hot Deals & Exclusive Offers</h2>
            <p class="sub">Find limited-time offers and the best rates from our top-rated suppliers across all vehicle categories.</p>
            <div class="offer-grid">
                <a href="#" class="offer">
                    <div class="meta">
                        <span class="tag hot"><svg><use href="#i-flame"/></svg> Hot Deal</span>
                        <span class="price">From £29/day</span>
                    </div>
                    <h4>Economy Class Car Hire</h4>
                    <p>Book a VW Polo or equivalent for a week or more in London. Limited availability.</p>
                </a>
                <a href="#" class="offer">
                    <div class="meta">
                        <span class="tag"><svg><use href="#i-briefcase"/></svg> PHV Special</span>
                        <span class="price">£220/week</span>
                    </div>
                    <h4>New Toyota Prius PCO Hire</h4>
                    <p>Low mileage, fully compliant 2024 model, long-term PHV rental. Deposit required.</p>
                </a>
                <a href="#" class="offer">
                    <div class="meta">
                        <span class="tag"><svg><use href="#i-crown"/></svg> Executive</span>
                        <span class="price">From £80/hour</span>
                    </div>
                    <h4>Mercedes S-Class Chauffeur</h4>
                    <p>Luxury executive travel for airport transfers. Includes meet & greet service.</p>
                </a>
            </div>
        </div>
    </section>

    <section class="section" style="padding:10px 0 18px">
        <div class="container">
            <div class="premium-strip">
                <div class="premium-inner">
                    <div>
                        <h2>Going above and beyond with ANI Premium</h2>
                        <p>Access exclusive vehicles, priority booking support, dedicated account management, and loyalty rewards.</p>
                        <div class="ticks">
                            <div class="tick"><svg><use href="#i-star"/></svg> Priority Access</div>
                            <div class="tick"><svg><use href="#i-headset"/></svg> 24/7 Concierge</div>
                            <div class="tick"><svg><use href="#i-money"/></svg> Rewards & Discounts</div>
                        </div>
                    </div>
                    <button class="premium-btn">
                        Learn more about Premium
                        <svg><use href="#i-arrow"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="section anchor" id="join">
        <div class="container">
            <h2>Are you a vehicle supplier? Partner with us.</h2>
            <p class="sub">Join the ANI Motors network to grow your fleet's reach, manage bookings efficiently, and access premium clients.</p>
            <div class="join">
                <div class="panel">
                    <h3>Key benefits of joining</h3>
                    <p>ANI Motors handles the complexity of marketing and bookings, allowing you to focus purely on service delivery. We provide tools to manage availability, pricing, and compliance across all your services.</p>
                    <ul>
                        <li>Expand your customer base with our global marketplace.</li>
                        <li>Integrated tools for PHV/PCO licensing and documentation.</li>
                        <li>Receive secure, timely payments for all bookings.</li>
                    </ul>
                    <div class="kpi">
                        <div class="k"><b>100+</b> <span>Trusted Suppliers</span></div>
                        <div class="k"><b>50k+</b> <span>Monthly Searches</span></div>
                    </div>
                </div>
                <div class="panel">
                    <h3>Enquire about partnership</h3>
                    <p>Tell us a little about your business and we'll be in touch to discuss partnership opportunities.</p>
                    <form class="form-mini" onsubmit="return false">
                        <div class="mini-input">
                            <svg><use href="#i-building"/></svg>
                            <input placeholder="Business Name" required />
                        </div>
                        <div class="mini-input">
                            <svg><use href="#i-user"/></svg>
                            <input type="email" placeholder="Contact Email" required />
                        </div>
                        <div class="mini-input">
                            <svg><use href="#i-doc"/></svg>
                            <select>
                                <option>Select Service Type...</option>
                                <option>Standard Car Hire</option>
                                <option>Private Hire/PCO</option>
                                <option>Executive Chauffeur</option>
                            </select>
                        </div>
                        <button class="btn" style="width:100%">Submit Enquiry</button>
                    </form>
                    <p class="note">We aim to respond to all partnership enquiries within 48 hours.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section anchor" id="about">
        <div class="container">
            <h2>About ANI Motors</h2>
            <p class="sub">Founded on the principle of transparency and trust, ANI Motors is dedicated to connecting customers with the most reliable vehicle hire and chauffeur services available.</p>
            <div class="about">
                <div class="panel">
                    <h3>Our Mission and Vision</h3>
                    <p>To be the world's leading, all-in-one vehicle mobility marketplace. We strive to simplify complex markets like PHV/PCO rentals and high-end chauffeur services, making them accessible, transparent, and secure for everyone.</p>
                    <div class="values">
                        <div class="value">
                            <div class="top"><svg><use href="#i-check"/></svg> <b>Integrity</b></div>
                            <p>We maintain clear standards and transparent pricing across all partners.</p>
                        </div>
                        <div class="value">
                            <div class="top"><svg><use href="#i-check"/></svg> <b>Innovation</b></div>
                            <p>Using technology to simplify the search, comparison, and booking process.</p>
                        </div>
                        <div class="value">
                            <div class="top"><svg><use href="#i-check"/></svg> <b>Customer Focus</b></div>
                            <p>Our platform and support systems are built around the user experience.</p>
                        </div>
                        <div class="value">
                            <div class="top"><svg><use href="#i-check"/></svg> <b>Quality</b></div>
                            <p>We only partner with suppliers who meet our high standards for vehicles and service.</p>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <h3>Frequently Asked Questions</h3>
                    <div class="faq">
                        <details>
                            <summary><span class="q"><svg><use href="#i-star"/></svg> Is there a booking fee?</span> <svg class="chev"><use href="#i-chevron"/></svg></summary>
                            <p>ANI Motors does not charge a separate booking fee. The price you see includes all marketplace service charges. Any supplier fees (like deposits) will be clearly noted before booking.</p>
                        </details>
                        <details>
                            <summary><span class="q"><svg><use href="#i-star"/></svg> How do I amend a booking?</span> <svg class="chev"><use href="#i-chevron"/></svg></summary>
                            <p>All amendments or cancellations must be handled directly with the vehicle supplier, whose contact details are provided in your confirmation email.</p>
                        </details>
                        <details>
                            <summary><span class="q"><svg><use href="#i-star"/></svg> Are PHV vehicles fully compliant?</span> <svg class="chev"><use href="#i-chevron"/></svg></summary>
                            <p>Yes, all vehicles listed under the PHV/PCO tab are confirmed by the supplier to meet necessary licensing and regulatory requirements.</p>
                        </details>
                        <details>
                            <summary><span class="q"><svg><use href="#i-star"/></svg> What if I need 24/7 support?</span> <svg class="chev"><use href="#i-chevron"/></svg></summary>
                            <p>For urgent booking issues, please contact your supplier first. For platform-related help, ANI Motors offers dedicated customer support.</p>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="seo">
                <div class="panel">
                    <h2>Explore Popular Locations</h2>
                    <p class="sub">Find the best deals for vehicle hire and chauffeur services across our most popular UK and international hubs.</p>
                    <div class="loc-grid">
                        <a href="#" class="loc">
                            <b>London Heathrow</b>
                            <span>LHR Car Hire, Chauffeur Service, PHV Rentals</span>
                        </a>
                        <a href="#" class="loc">
                            <b>Manchester Airport</b>
                            <span>MAN Rental Cars & Airport Transfers</span>
                        </a>
                        <a href="#" class="loc">
                            <b>Birmingham City</b>
                            <span>B'ham Van Hire & Executive Cars</span>
                        </a>
                    </div>
                </div>
                <div class="panel">
                    <h2>Search Categories</h2>
                    <p class="sub">Browse popular vehicle categories for direct booking.</p>
                    <div class="loc-grid">
                        <a href="#" class="loc">
                            <b>Electric Car Hire</b>
                            <span>Eco-friendly rentals across all major cities.</span>
                        </a>
                        <a href="#" class="loc">
                            <b>7-Seater Van Hire</b>
                            <span>People carriers and large family transport.</span>
                        </a>
                        <a href="#" class="loc">
                            <b>Long-Term Monthly Rental</b>
                            <span>Flexible contracts for 1 month or more.</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection