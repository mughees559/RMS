<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style_signup.css">
</head>
<body>

    <div class="main">

        <section class="signup">
           
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="/registerStudent" enctype="multipart/form-data" class="signup-form">
                         {{ csrf_field() }}
                         @if (count($errors) > 0)

                            <div class="alert alert-danger">

                                <strong>Whoops!</strong> There were some problems with your input.

                                <ul>

                                    @foreach ($errors->all() as $error)

                                        <li>{{ $error }}</li>

                                    @endforeach

                                </ul>

                            </div>


                            @endif
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                    </a>
                                </div>

                            @endif
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Student Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="roll_no" id="roll_no" placeholder="Roll no"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <input type="tel" pattern="[0-9]{11}" class="form-input" name="phone_no" id="phone_no" placeholder="Your Phone No"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary" >
                            Sign Up
                        </button>
                        </div>
                    <p class="loginhere">
                        Have already an account ? <a href="/login" class="loginhere-link">Login here</a>
                    </p>
                     </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery_signup/jquery.min.js"></script>
    <script src="js/main_signup.js"></script>
</body>
</html>