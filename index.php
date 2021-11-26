<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;400;700&display=swap" rel="stylesheet"> 
</head>
<body>
   <div class="main">
      <div>
         <h1>Contact Us</h1>
         <p class="lightP">Any question or remarks? Just write us  message!</p>
         <?php 
            if (isset($_SESSION['error'])) {
               echo "<span style='color:red;'>".$_SESSION['error']."</span>";
               unset($_SESSION['error']);
            } 
         ?>
      </div>   
         <div class="mainCont">
            <div class="contactInfo">
               <div>
                  <h2>Contact Information</h2>
                  <p>Fill up the form and out Team will get back to up within 24 hours.</p>
               </div>
               <p>+0123 4567 9810</p>
               <p>hello@flowbase.com</p>
               <p>102 Street 2714 Don</p>
            </div>
            <div class="formCont">
               <form action="send.php" method="post">
                  <div class="clientContactInfo">
                     <div>
                        <label for="name">First Name</label><br>
                        <input type="text" name="name" id="name" placeholder="John" class="inputINFO" required>
                     </div>
                     <div>
                        <label for="surname">Last Name</label><br>
                        <input type="text" name="surname" id="surname" placeholder="Smith" class="inputINFO" required>
                     </div>
                     <div>
                        <label for="email">Mail</label><br>
                        <input type="email" name="email" id="email" placeholder="johnsmith@flowbase.com" class="inputINFO" required>
                     </div>
                     <div>
                        <label for="phone">Phone</label><br>
                        <input type="tel" name="phone" id="phone" pattern="[+]{1}[0-9]{1-3}[ ]{1}-[0-9]{3}-[0-9]{3}-[0-9]{3}" class="inputINFO" placeholder="+48 123-456-789" required> 
                     </div>
                  </div>
                  <div class="typeOfSite">
                     <h3>What the of website do you need?</h3>
                     <input type="radio" name="type" id="type1" value="webDes" required>
                     <label for="type1">Web Development</label>
                     <input type="radio" name="type" id="type2" value="webDev">
                     <label for="type2">Web Design</label>
                     <input type="radio" name="type" id="type3" value="logoDes">
                     <label for="type3">Logo Design</label>
                     <input type="radio" name="type" id="type4" value="other">
                     <label for="type4">Other</label>
                  </div>
                  <div class="message">
                     <label for="message"><h4>Message</h4></label>
                     <textarea placeholder="Write your message ..." rows="3" cols="72" name="message" id="message" minlength="20" required></textarea>
                     <div class="btnCtn" style="text-align: right;">
                        <button>Send Message</button>
                     </div>
                  </div>
                  
                  
               </form>
            </div>
         </div>
      </div>
   </div>
</body>
<?php
   session_destroy();
?>
</html>