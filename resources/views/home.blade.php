<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Nursery Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite('resources/css/home.css')
</head>
<body>
    <header class="header">
         <div>
        <img src="../images/nursery.jpg" class="image">
        <h3>Nursery App</h3>
</div>



        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#programs">Programs</a>
            <a href="#staff">Staffs</a>
            <a href="#contact">Contact</a>
        </nav>

        

        <div class="user-profile">
          <i class="fa fa-user-circle" onclick="toggleUserInfo()"></i>

          <div class="user-info" id="user-info"style="display: none;">
            <p><strong>{{ auth()->user()->name }}</strong></p>
            <p>{{ auth()->user()->email }}</p>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
             <button type="submit" class="logout-btn">Log Out</button>
            </form>
          </div>
        </div>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

    <main>
        <!-- Home Section -->
        <section id="home">
            <div class="content">
            <h3>Looking For a <span>NURSERY</span> ?</h3>
            <p>We offer you the best benefits for your children</p>
            <p class="age">Children must be between 3 and 5 years old to be eligible for registration.</p>
            <h2>PLAY AND LEARN WITH US</h2>
            <a href="{{ route('guardian.registration') }}" class="btn">Register Your Child </a>
        </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about">
            <h2 class="heading"><span>ABOUT</span> US</h2>
            <div class="row">
              <div class="image">
                <img src="../images/aboutus.PNG">
              </div>
              <div class="content">
                <h3>Exploring, Growing, And Thriving Together</h3>
                <p>Welcome to our nursery, where we nurture young minds through creative and educational programs. Our experienced staff is dedicated to providing a safe and fun environment for children to grow, explore, and learn</p>
              </div>
            </div>
        </section>

        <!-- Programs Section -->
        <section id="programs" class="programs">
            <h2 class="heading">OUR <span>PROGRAMS</span></h2>
            <div class="box-container">
            @foreach($programs as $program)
              <div class="program">
              <h3>{{ $program->name }}</h3>
              <p>{{ $program->description }}</p>
              <p>Duration: {{ $program->duration }}</p>
            @if($program->image)
            <img src="{{ asset($program->image) }}" alt="{{ $program->name }}">
            @endif
    </div>
@endforeach
</div>
        </section>

        <!-- Staff Section -->
<section id="staff" class="staff">
    <h2 class="heading">OUR <span>Staff</span></h2>
    <div class="staff-container">
        @foreach($staffs as $staff)
        <div class="staff-box">
            @if($staff->image)
            <img src="{{ asset($staff->image) }}" alt="{{ $staff->name }}">
            @endif
                <h3>{{ $staff->firstname }} {{ $staff->lastname }}</h3>
                <p> {{ $staff->position }}</p>
                <p> {{ $staff->qualification }}</p>
                <div class="share">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                </div>
        </div>
        @endforeach
    </div>
</section>



        <!-- Contact Section -->
        <section id="contact" class="contact">
            <h2 class="heading"><span>Contact</span> Us</h2>
            <p class="question">If you have any questions, feel free to reach out to us.</p>
            <div class="icons-container">

            <div class="icons">
                <i class="fas fa-clock"></i>
                <h3>opening hours :</h3>
                <p>Monday - Friday: 08:00 am to 02:00 pm</p>
                <p>Saturday: 09:00 am to 12:00 pm</p>
            </div>

            <div class="icons">
                <i class="fas fa-envelope"></i>
                <h3>email</h3>
                <p>nurserymanagement29@gmail.com</p>
            </div>

            <div class="icons">
                <i class="fas fa-phone"></i>
                <h3>phone number</h3>
                <p>+123-456-7890</p>
            </div>

        </div>

        <div class="row">

            <div class="image">
                <img src="images/finger-mobile-phone.png" alt="">
            </div>

            <form action="{{ route('contact.send') }}" method="POST">
            @csrf
                <h3>get in touch</h3>
               
                
                <div class="inputBox">
                    <input type="text" name="name" placeholder="your name">
                    <input type="email" name="email" placeholder="your email">
                </div>
                <div class="inputBox">
                    <input type="number" name="phone" placeholder="your number">
                    <input type="text" name="subject" placeholder="your subject">
                </div>
                <textarea placeholder="your message" name="message" cols="30" rows="10"></textarea>
                <input type="submit" value="send message" class="btn">
                
                @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
               
            </form>
            
           

        </div>
       
        </section>
    </main>

    
    <footer>
        <div class="nurseryinfo">
   <div class="footer-contact">
       <h4>Contact Us</h4>
       <p>123 Nursery Lane, City, State</p>
       <p>Email: nurserymanagement29@gmail.com</p>
       <p>Phone: +1 234 567 890</p>
       <p>Hours: Mon-Fri, 8 AM - 2 PM</p>
       <p>Sat, 9 AM - 12 PM</p>
   </div>

   <div class="footer-links">
       <h4>Quick Links</h4>
       <ul>
           <li><a href="/home">Home</a></li>
           <li><a href="#programs">Programs</a></li>
           <li><a href="#staff">Staff</a></li>
           <li><a href="/home">Enroll Now</a></li>
       </ul>
   </div>

   <div class="footer-social">
       <h4>Follow Us</h4>
       <a href="" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
       <a href="" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
       <a href="" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
   </div>

</div>

   <div class="footer-copyright">
       <p>&copy; 2024 Nursery Management. All Rights Reserved.</p>
   </div>
</footer>

    @vite('resources/js/home.js')
</body>
</html>
