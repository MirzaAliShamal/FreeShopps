@extends('layouts.front')

@section('title', 'Community Guidelines')

@section('css')
    <style>
        .section {
            padding: 60px 0px;
        }
    </style>
@endsection

@section('content')

@include('front.components.pages_banner')


<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow border-0 rounded">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('community-guidelines-1.jpg') }}" class="img-fluid" alt="Community">
                        </div>
                        <p class="">
                            We are connecting one another giving away stuff to our neighbors who is deserves and who needs and being happy for having it .freeshopps building bridge to the Community every where but need to be careful for not being disrupted by doing something or someone anything wrong therefore created a guideline to follow for the safety , security of our users and our community, However, these guidelines should give you a general sense of how to behave on freeshopps . If you see anyone violating these guidelines, please let us know immediately so we can take necessary steps right away. Let’s all together make this world a better place for every one. Thanks for being a part of our community!
                        </p>
                        <div class="text-center">
                            <img src="{{ asset('community-guidelines-2.jpg') }}" class="img-fluid" alt="Community">
                        </div>
                        <p class="">
                            All we need to be connected , we need to care and fear to all our neighborhood, freeshoopps is the place where you can surf and find stuff in the neighbor and get them for free we have to build trust and communication, we all need to be committed. With all respect to other members and must obey the guidelines.
                        </p>
                        
                        <h5 class="card-title">Prohibited conduct:</h5>
                        <p class="">
                            All items you should post only if its ready for some one to pick up, only post the item you intend to give away or get rid off, but knowing that someone might reach out to you immediately after post, so don’t post any item that you don’t want to get rid off. All items make sure include photos that are clear, well-lit, and accurately represent what you’re offering. freeshopps is more than an app, it’s a community.We built a community around letting go of old stuff, but we think it’s important to Remember, most of the people you talk to on freeshopps are your neighbors.
                        </p>
                        <ul class="list-unstyled ">
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Any Items that promote or support hate groups.</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Items that depict or glorify violence.</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Please don’t post anything is not belong to you.</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>We have a zero tolerance policy for stolen goods. Remember, violating someone else’s intellectual property is a form of theft. This means counterfeit goods or replicas that are being sold without permission from the rightful owner aren’t allowed.</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Posting or transmitting any virus, worm, Trojan horse, Easter egg, time bomb, spyware or other computer code, file or program that’s or is potentially harmful or invasive or intended to damage or hijack the operation of, or to monitor the use of, any hardware, software or equipment (each, a “Virus”).</li>
                        </ul>
                        <p class="">
                            Using freeshopps for any purpose that’s fraudulent or unlawful also we’ll remove any item we feel is harmful to the freeshopps community.
                        </p>
                        
                        <h5 class="card-title">Adult Content:</h5>
                        <p class="">
                            Leave some things to the imagination. Sexual content, adult toys or other items that include explicit nudity are not allowed on freeshopps .
                        </p>
                        <p class="mb-0"><strong>Prohibited items include:</strong></p>
                        <ul class="list-unstyled ">
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Pornography </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Adult Toys </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Drugs & alcohol</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Tobacco </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>E-cigarettes and e-juice </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Illegal Drugs </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Prescription drugs or medical devices  </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Over-the-counter drugs and supplements   </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Animals but, you can list pipes, hookahs, or other accessories associated with tobacco products.</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Party trays of perishable food   </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Homemade jams and jellies </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Baby food and formula </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Repeated listings of the same item  </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Weapons and Other Dangerous Items</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>We prohibit dangerous items like firearms, fireworks, All firearms, accessories and ammunition</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Airsoft, BB, or other novelty guns that do not clearly display an orange safety tip </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Tasers </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Burglary Tools </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Fireworks</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Pesticides, tear gas, and other hazardous chemicals or controlled substances</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Miscellaneous</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>The policies above cover most of what isn’t allowed, but are not exhaustive. We’ll remove any item we feel is harmful to the freeshopps community.</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Bodily fluids such as breast milk</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Sale of currency as a product (cryptocurrencies, euros, dollars, etc.). </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Collectibles are okay.</li>
                        </ul>
                        <p class="">
                            We know all the great stuff you find on freeshopps will make your head spin, but the products shouldn’t to do the same. freeshopps isn’t a place to trade drugs or alcohol, even if it’s legal to do so in your jurisdiction.
                        </p>
                        <p class="mb-0"><strong>Prohibited listings include:</strong></p>
                        <ul class="list-unstyled ">
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Live animals (including coral) </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Fossils </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Skin and bones from endangered or protected species </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Food </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>It doesn’t matter how good your cooking is, food and other related food products are not allowed.</li>
                        </ul>
                        <p class="mb-0"><strong>Prohibited services include:</strong></p>
                        <ul class="list-unstyled ">
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Financial Services (tax filing and preparation, insurance, loans, and credit scoring)</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Legal Services (debt collection, will preparation, legal advice) </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Medical Services (chiropractic care, cosmetic services like Botox) </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Escort Services, companionship, matchmaking</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Massage services</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Services which are themselves illegal (unlocking phones and other hardware) or may include illegal activity</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Services related to alcohol or drugs </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Services involving guns or other weapons </li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Affiliate or pyramid schemes</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Services making extreme or unrealistic promises (“Lose 30 lbs in a week!”, “Cure cancer!”)</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>Spam</li>
                            <li><i data-feather="arrow-right" class="fea icon-sm me-2"></i>We don’t allow spam on our app – not the meat product and not the annoying, untargeted behavior that clogs up the internet. Don’t repeatedly post the same products, and don’t start a conversation with someone unless you’re actually interested in picking their item.</li>
                        </ul>
                        
                        
                        
                        
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Terms & Conditions -->

@endsection

