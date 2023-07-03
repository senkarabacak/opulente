<div class="body">
   <div class="bInner">
      <form action="config/dbaccess" class="biForm" id='biForm' method='post'>
         <div class="bifHeader title-size w600">Register</div>
         <div class="bifInputs">
            <select name="salutation" class="bifiSelect bifiInput" id='salutation'>
               <option value="false" disabled="" selected="" hidden="" id="optionDesabled">Salutation</option>
               <option value="Sir">Sir</option>
               <option value="Madam">Madam</option>
            </select>
            <div class="bifiDouble">
               <input type="text" name='fName' class="bifiInput" placeholder='First Name' minlength="3" required>
               <input type="text" name='lName' class="bifiInput" placeholder='Last Name' minlength="3" required>
            </div>
            <input type="text" name='address' class="bifiInput" placeholder='Address' minlength="3" required>
            <div class="bifiDouble">
               <input type="text" name='zip' class="bifiInput" placeholder='Zip Code' minlength="2" required>
               <select name="country" class="bifiSelect bifiInput"  id='country'>
                  <option value="false" disabled="" selected="" hidden="" id="optionDesabled">Country</option>
                  <?php include 'res/blocks/Register/countries_list.php'; ?>
               </select>
            </div>
            <input type="email" name='email' class="bifiInput" placeholder='Email' required>
            <input type="text" name='username' class="bifiInput" placeholder='Username' minlength="4" required>
            <input type="password" name='' class="bifiInput" placeholder='Password' id='pass' minlength="4" required>
            <input type="password" name='' class="bifiInput" placeholder='Repeat Password' id='passRep' minlength="4" required>
            <input type="text" style='display: none' name='formType' value='register'>
            <input type="submit" class='bifiInput bifiSubmit' value='Register' id='submit'>
         </div>
         <div class="bifrText text-small-size">Already have an account? <span><a href="signup" class='w500'>Login</a></span></div>
         <div class="bifrText bifrTextBack text-small-size"><span><a href="/" class='w500'>Get Back</a></span></div>
      </form>
   </div>
</div>






<?php
if(isset($_SESSION['regErr'])){
    if($_SESSION['regErr'] == 'user'){
        echo "<script>setTimeout(function(){alert('Selected username already exists')}, 200)</script>";
    }else if($_SESSION['regErr'] == 'email'){
        echo "<script>setTimeout(function(){alert('Selected email is already in use')}, 200)</script>";
    }
}

unset($_SESSION['regErr']);
?>