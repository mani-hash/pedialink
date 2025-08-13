@extends('layout/main')

@section('title')
Home
@endsection

@section('css')
<link rel="stylesheet" href="css/pages/home.css">
@endsection



@section('content')

<!-- Navbar -->
<div class="navbar">
  <!-- Logo -->
  <img src="assets/logo.png" alt="PediaLink Logo">
  <!-- Navigation Menu -->
  <div class="navmenu">
    <a href="">About</a>
    <a href="">For Parents</a>
    <a href="">For PHM Doctors</a>
    <a href="">For Resources</a>
    <c-button $type="primary">
      Get Started
    </c-button>
  </div>
</div>
<!-- Body -->
<div class="main-body">
  <!-- Main Content -->
  <div class="main-content">
    <!-- Hero Section -->
    <div class="hero">
      <h1>Your Partmer in Parenthood</h1>
      <p>Connect with top PHM & doctors, monitor your child's health, and receive personalized support every step of the
        way.</p>
      <c-button $type="primary">
        Get Started
      </c-button>


    </div>

    <!-- About Section -->
    <div class="section">
      <h2>About PediaLink</h2>
      <p>PediaLink is a web application designed to support parents and PHM doctors in providing the best possible care
        for children. We offer a range of tools and resources to help you monitor your child's health, communicate
        effectively, and access expert guidance.</p>
      <!-- Card Container -->
      <div class="cards-container">
        <!-- Card-1 -->
        <div class="card">
          <img src="assets/icons/favourite.svg" class="icon" alt="">
          <h3>Comprehensive Health Monitoring</h3>
          <p>Track your child's growth, development, and milestones with our intuitive monitoring tools.</p>
        </div>
        <!-- Card-2 -->
        <div class="card">
          <img src="assets/icons/user-multiple.svg" class="icon" alt="">
          <h3>Expert PHM Doctor Network</h3>
          <p>Connect with a network of experienced PHM doctors specializing in child and maternal care.</p>
        </div>
        <!-- Card-3 -->
        <div class="card">
          <img src="assets/icons/bubble-chat.svg" class="icon" alt="">
          <h3>Seamless Communication & Support</h3>
          <p>Communicate with your PHM doctor, schedule appointments, and access support resources easily.</p>
        </div>
      </div>
    </div>
    <!-- For Parents Section -->
    <div class="section">
      <h2>For Parents</h2>
      <p>Manage your child's health, connect with PHM doctors, and access personalized support.</p>
      <!-- Card Container -->
      <div class="cards-container">
        <!-- Card-1 -->
        <div class="image-card">
          <img src="assets/home/parent-01.png" class="icon" alt="">
          <h3>Health Monitoring</h3>
          <p>Track growth, development, and milestones with easy-to-use tools.</p>
        </div>
        <!-- Card-2 -->
        <div class="image-card">
          <img src="assets/home/parent-02.png"  alt="">
          <h3>PHM Doctor Consultations</h3>
          <p>Schedule virtual consultations with experienced PHM doctors.</p>
        </div>
        <!-- Card-3 -->
        <div class="image-card">
          <img src="assets/home/parent-03.png" class="" alt="">
          <h3>Personalized Support</h3>
          <p>Receive tailored advice and support for your child's specific needs.</p>
        </div>
      </div>
    </div>
    <!-- For PHM & Doctor Section -->
    <div class="section">
      <h2>For PHM & Doctors</h2>
      <p>Provide expert care, manage patient information, and collaborate effectively.</p>
      <!-- Card Container -->
      <div class="cards-container">
        <!-- Card-1 -->
        <div class="image-card">
          <img src="assets/home/phm-doc-01.png" alt="">
          <h3>Patient Management</h3>
          <p>Access and manage patient health information securely.</p>
        </div>
        <!-- Card-2 -->
        <div class="image-card">
        <img src="assets/home/phm-doc-02.png" alt="">
        <h3>Virtual Consultations</h3>
          <p>Conduct virtual consultations with parents and provide expert guidance.</p>
        </div>
        <!-- Card-3 -->
        <div class="image-card">
        <img src="assets/home/phm-doc-03.png" alt="">
        <h3>Collaboration Tools</h3>
          <p>Collaborate with other healthcare professionals for comprehensive care.</p>
        </div>
      </div>
    </div>

    <!-- Communication & Support Section -->
    <div class="section">
      <h2> Communication & Support</h2>
      <p>Stay connected with your PHM doctor and access the resources you need.</p>
      <!-- Card Container -->
      <div class="cards-container">
        <!-- Card-1 -->
        <div class="card">
          <img src="assets/icons/bubble-chat.svg" class="icon" alt="">
          <h3>Secure Messaging</h3>
          <p>Communicate with your PHM doctor securely and conveniently.</p>
        </div>
        <!-- Card-2 -->
        <div class="card">
          <img src="assets/icons/calendar-01.svg" class="icon" alt="">
          <h3>Appointment Scheduling</h3>
          <p>Schedule and manage appointments with your PHM doctor.</p>
        </div>
        <!-- Card-3 -->
        <div class="card">
          <img src="assets/icons/help-circle.svg" class="icon" alt="">
          <h3>Support Resources</h3>
          <p>Access a library of articles, FAQs, and other helpful resources.</p>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection