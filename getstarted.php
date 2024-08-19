<?php

session_start();
if (isset($_SESSION['authetification'])){
    $_SESSION['status']="already logged in   ";
    header('Location:landingpage-html_new.php');
    die(0);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Font Icon -->
    <link rel="stylesheet" href="signup_login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="signup_login/css/style.css">


    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,maximum-scale=1"
    />
    <style>
      body {
        font-family: "Inter", sans-serif;
      }
    </style>
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"
      defer
    ></script>
  </head>

  <body class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
    <div
      class="max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1"
    >
      <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
        
        <div class="mt-12 flex flex-col items-center">
          <h1 class="text-2xl xl:text-3xl font-extrabold">
            LogIn 
          </h1>
          <?php 
                            if(isset($_SESSION['status']))
                            {
                                echo "<h4>".$_SESSION['status']."</h4>";
                                unset($_SESSION['status']);
                            }
                            elseif(isset($_SESSION['loggout'])){
                              echo "<h4>".$_SESSION['loggout']."</h4>";
                                unset($_SESSION['loggout']);
                            }
                        ?>
          <div class="w-full flex-1 mt-8">

            <div class="mx-auto max-w-xs">
              <form method="POST" class="register-form"  id="login-form" action="php_backend/login_code.php">
                <div class="form-group">
                    <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                    <input type="text" name="your_email" id="your_email" placeholder="   your email" />
                </div>
                <div class="form-group">
                    <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                    <input type="password" name="your_pass" id="your_pass" placeholder="    Password" />
                </div>
                <div class="form-group form-button">
                <input type="submit" name="login_btn" id="login_btn" class="form-submit" value="login "/>
              </div>
            </form>
              <!--<button name="login_btn"
                class="mt-5 tracking-wide  font-semibold bg-blue-100 text-dark-100 w-full py-3 rounded-lg hover:bg-blue-600 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none"
              >
                <svg
                  class="w-6 h-6 -ml-2"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                  <circle cx="8.5" cy="7" r="4" />
                  <path d="M20 8v6M23 11h-6" />
                </svg>
                <span class="ml-3 ">
                  <a>LogIn</a>
                </span>
              </button>!-->
              
              
              <div class="my-10 border-b text-center">
                <div
                  class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2"
                >
                  Or continue with 
                </div>
              </div>
              <div class="social-login">
                <ul class="socials">
                    <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                    <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                    <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                </ul>
            </div>
              <div class="my-10 border-b text-center">
                <div
                  class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2"
                >
                  no account ?
                </div>
              </div>
              <!-- sign up button  -->
              <button
                class="mt-3 tracking-wide  font-semibold bg-blue-100 text-dark-100 w-full py-3 rounded-lg hover:bg-blue-600 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none"
              >
                <svg
                  class="w-6 h-6 -ml-2"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                  <circle cx="8.5" cy="7" r="4" />
                  <path d="M20 8v6M23 11h-6" />
                </svg>
                <a href="signup_login/student_company.html"><span class="ml-3 ">
                  Sign Up 
                </span>
              </a>
              </button>
              <p class="mt-6 text-xs text-gray-600 text-center">
                I agree to abide by templatana's
                <a href="#" class="border-b border-gray-500 border-dotted">
                  Terms of Service
                </a>
                and its
                <a href="#" class="border-b border-gray-500 border-dotted">
                  Privacy Policy
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-1 bg-blue-100 text-center hidden lg:flex">
        <div
          class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
          style="background-image: url('img/web-designer-building-website.svg');"
        ></div>
      </div>
    </div>
    <div class="REMOVE-THIS-ELEMENT-IF-YOU-ARE-USING-THIS-PAGE hidden treact-popup fixed inset-0 flex items-center justify-center" style="background-color: rgba(0,0,0,0.3);">
        <div class="max-w-lg p-8 sm:pb-4 bg-white rounded shadow-lg text-center sm:text-left">
          
          <h3 class="text-xl sm:text-2xl font-semibold mb-6 flex flex-col sm:flex-row items-center">
            <div class="bg-green-200 p-2 rounded-full flex items-center mb-4 sm:mb-0 sm:mr-2">
              <svg class="text-green-800 inline-block w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
              </div>
            Free TailwindCSS Component Kit!
          </h3>  
          <p>I recently released Treact, a <span class="font-bold">free</span> TailwindCSS Component Kit built with React.</p>
          <p class="mt-2">It has 52 different UI components, 7 landing pages, and 8 inner pages prebuilt. And they are customizable!</p>
          <div class="mt-8 pt-8 sm:pt-4 border-t -mx-8 px-8 flex flex-col sm:flex-row justify-end leading-relaxed">
            <button class="close-treact-popup px-8 py-3 sm:py-2 rounded border border-gray-400 hover:bg-gray-200 transition duration-300">Close</button>
            <a class="font-bold mt-4 sm:mt-0 sm:ml-4 px-8 py-3 sm:py-2 rounded bg-purple-700 text-gray-100 hover:bg-purple-900 transition duration-300 text-center" href="https://treact.owaiskhan.me" target="_blank">See Treact</a>
          </div>
        </div>
      </div>
  </body>
</html>